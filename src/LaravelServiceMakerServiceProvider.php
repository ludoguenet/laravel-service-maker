<?php

namespace NordCoders\LaravelServiceMaker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use NordCoders\LaravelServiceMaker\Commands\LaravelServiceMakerCommand;

class LaravelServiceMakerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-service-maker')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-service-maker_table')
            ->hasCommand(LaravelServiceMakerCommand::class);
    }
}
