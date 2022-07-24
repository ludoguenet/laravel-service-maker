<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Actions;

use Illuminate\Console\Command;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceFileActionContract;

class CreateServiceFileAction implements CreateServiceFileActionContract
{
    public function handle(
        string $serviceName,
        string $noContract,
        Command $serviceMakerCommand,
    ): void {
        if ($noContract) {
            $this->withNoContract(
                serviceName: $serviceName,
                serviceMakerCommand: $serviceMakerCommand,
            );

            return;
        }

        if (config('service-maker.with_interface')) {
            $this->withContract(
                serviceName: $serviceName,
                serviceMakerCommand: $serviceMakerCommand,
            );

            return;
        }

        $this->withNoContract(
            serviceName: $serviceName,
            serviceMakerCommand: $serviceMakerCommand,
        );
    }

    protected function withContract(string $serviceName, Command $serviceMakerCommand): void
    {
        $serviceMakerCommand->call('make:servicefile', [
            'name' => $serviceName,
        ]);
    }

    protected function withNoContract(string $serviceName, Command $serviceMakerCommand): void
    {
        $serviceMakerCommand->call('make:servicewithnocontract', [
            'name' => $serviceName,
        ]);
    }
}
