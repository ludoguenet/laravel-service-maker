<?php

namespace NordCoders\LaravelServiceMaker\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use NordCoders\LaravelServiceMaker\LaravelServiceMakerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'NordCoders\\LaravelServiceMaker\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelServiceMakerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-service-maker_table.php.stub';
        $migration->up();
        */
    }
}
