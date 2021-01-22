<?php

namespace ilizhu\LaravelApollo;

use Illuminate\Support\ServiceProvider;
use ilizhu\LaravelApollo\ApolloService;
use Illuminate\Cache\CacheManager;

class ApolloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../config/apollo.php') => config_path('apollo.php')
        ]);
        $input = new InputVar($this->app['apollo.cache']);
        $input->input();
        $this->app->make(\Illuminate\Foundation\Bootstrap\LoadConfiguration::class)->bootstrap($this->app);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->registerServices();
        $this->registerCommands();
    }

    protected function registerServices()
    {

        $this->app->singleton('apollo.cache', function ($app) {
            $app['config']->set('cache', config('apollo.cache'));
            $obj = new CacheManager($app);
            return $obj;
        });

        $this->app->singleton('apollo.service', function ($app) {
            return new ApolloService($app['apollo.cache']);
        });

        $this->app->singleton('apollo.variable', function () {
            return new ApolloVariable();
        });
    }

    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/apollo.php', 'apollo'
        );
        ApolloService::useConfig(config('apollo.redis_use'));
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([Console\ApolloWorker::class]);
            return;
        }
    }
}
