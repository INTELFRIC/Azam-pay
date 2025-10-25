<?php

namespace intelfric\Azampay\Tests;

use intelfric\Azampay\AzampayServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [AzampayServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Azampay' => \intelfric\Azampay\Facades\Azampay::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // make sure, our config is loaded
        $app['config']->set('azampay.appName', 'testApp');
        $app['config']->set('azampay.clientId', 'testClient');
        $app['config']->set('azampay.clientSecret', 'testSecret');
        $app['config']->set('azampay.environment', 'sandbox');
    }
}

