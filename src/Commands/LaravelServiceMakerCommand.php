<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceContractFileActionContract;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceFileActionContract;
use Symfony\Component\Console\Input\InputOption;

final class LaravelServiceMakerCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:service
    {name : The name of the service you want to create}
    {--noContract : Create a service without contract}
    ';

    /**
     * @var string
     */
    protected $description = 'Create a service implementing its own interface';

    /**
     * @var string
     */
    protected $type = 'Service';

    public function handle(
        CreateServiceFileActionContract $createServiceFileAction,
        CreateServiceContractFileActionContract $createServiceContractFileAction
    ): int {
        $name = Str::studly($this->argument('name'));

        $createServiceFileAction->handle(
            serviceName: $name,
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );

        $createServiceContractFileAction->handle(
            serviceName: $name,
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );

        $this->comment('Service files created with success!');

        return self::SUCCESS;
    }
}
