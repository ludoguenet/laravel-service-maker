<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Commands\Files\Migration;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Str;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceContractFileActionContract;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceFileActionContract;
use Symfony\Component\Console\Input\InputOption;

final class CreateServiceMigrationCommand extends ModelMakeCommand
{
    private CreateServiceFileActionContract $createServiceFileAction;

    private CreateServiceContractFileActionContract $createServiceContractFileAction;

    public function __construct(
        CreateServiceFileActionContract $createServiceFileAction,
        CreateServiceContractFileActionContract $createServiceContractFileAction,
    ) {
        parent::__construct(
            new Filesystem(),
        );

        $this->createServiceFileAction = $createServiceFileAction;
        $this->createServiceContractFileAction = $createServiceContractFileAction;
    }

    public function handle(): void
    {
        parent::handle();

        if ($this->option('all')) {
            $this->input->setOption('service', true);
        }

        if ($this->option('service')) {
            $this->createService();
        }
    }

    public function getOptions(): array
    {
        $options = parent::getOptions();

        $options[] = ['service', 'S', InputOption::VALUE_NONE, 'Create a service for the model'];
        $options[] = ['noContract', 'N', InputOption::VALUE_NONE, 'Create a service without contract'];

        return $options;
    }

    protected function createService(): void
    {
        $this->createServiceFileAction->handle(
            serviceName: $this->getFormattedName(),
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );

        $this->createServiceContractFileAction->handle(
            serviceName: $this->getFormattedName(),
            noContract: $this->option('noContract'),
            serviceMakerCommand: $this,
        );
    }

    protected function getFormattedName(): string
    {
        return Str::studly($this->getNameInput());
    }
}
