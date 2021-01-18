<?php

namespace ilizhu\LaravelApollo\Console;

use Illuminate\Console\Command;

class ApolloWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apollo:worker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'apollo 配置更新监听任务';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(0);
        $apollo = app('apollo.service');
        $client = $apollo->getServer();

        $pid = getmypid();
        echo "start [$pid]\n";
        $err = '';
        try {
            $err = $client->start(function () use ($apollo, &$err) {
                $err = $apollo->startCallback();
            });
        } catch (\Exception $e) {
            $err = $e->getMessage();
        }

        if ($err!=''){
            echo '错误:'.$err . "\n";
        }

    }
}
