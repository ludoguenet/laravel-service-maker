<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker;

use NordCoders\LaravelServiceMaker\Actions\CreateServiceContractFileAction;
use NordCoders\LaravelServiceMaker\Actions\CreateServiceFileAction;
use NordCoders\LaravelServiceMaker\Commands\Files\Contract\CreateServiceContractCommand;
use NordCoders\LaravelServiceMaker\Commands\Files\Migration\CreateServiceMigrationCommand;
use NordCoders\LaravelServiceMaker\Commands\Files\Service\CreateServiceFileCommand;
use NordCoders\LaravelServiceMaker\Commands\Files\Service\CreateServiceFileWithNoContractCommand;
use NordCoders\LaravelServiceMaker\Commands\LaravelServiceMakerCommand;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceContractFileActionContract;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceFileActionContract;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class LaravelServiceMakerServiceProvider extends PackageServiceProvider
{
    public array $bindings = [
        CreateServiceFileActionContract::class => CreateServiceFileAction::class,
        CreateServiceContractFileActionContract::class => CreateServiceContractFileAction::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-service-maker')
            ->hasConfigFile('service-maker')
            ->hasCommand(LaravelServiceMakerCommand::class)
            ->hasCommand(CreateServiceFileCommand::class)
            ->hasCommand(CreateServiceFileWithNoContractCommand::class)
            ->hasCommand(CreateServiceContractCommand::class)
            ->hasCommand(CreateServiceMigrationCommand::class);
    }
}
