<?php

namespace ilizhu\LaravelApollo\Contracts;

interface Apollo
{
    /**
     * 重置env 变量
     * @return void mixed
     */
    public function resetConfig();
}
