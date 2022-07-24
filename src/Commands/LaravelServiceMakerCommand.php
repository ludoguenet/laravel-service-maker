<?php

namespace NordCoders\LaravelServiceMaker\Commands;

use Illuminate\Console\Command;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceFileActionContract;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceContractFileActionContract;

class LaravelServiceMakerCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service you want to create.} {--noContract : The service must not implement a contract}';

    /**
     * @var string
     */
    protected $description = 'Create a service implementing its own interface.';

    /**
     * @var string
     */
    protected $type = 'Service';

    public function handle(
        CreateServiceFileActionContract $createServiceFileAction,
        CreateServiceContractFileActionContract $createServiceContractFileAction
    ): int
    {
        $createServiceFileAction->handle(
            serviceName: $this->argument('name'),
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );

        $createServiceContractFileAction->handle(
            serviceName: $this->argument('name'),
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );

        $this->comment('Service files created with success!');

        return 1;
    }
}
