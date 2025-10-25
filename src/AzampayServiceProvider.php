<?php

declare(strict_types=1);

namespace intelfric\Azampay;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AzampayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-azampay')
            ->hasRoute('azampay_api')
            ->hasConfigFile();
    }

    public function register()
    {
        parent::register();

        $this->app->singleton('azampay', function ($app) {
            return new AzampayService();
        });
    }


}
