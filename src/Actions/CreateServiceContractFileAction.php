<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Actions;

use Illuminate\Console\Command;
use NordCoders\LaravelServiceMaker\Contracts\CreateServiceContractFileActionContract;

class CreateServiceContractFileAction implements CreateServiceContractFileActionContract
{
    public function handle(
        string $serviceName,
        string $noContract,
        Command $serviceMakerCommand,
    ): void {
        if ($noContract) {
            return;
        }

        if (config('service-maker.with_interface')) {
            $this->generateContract(
                serviceName: $serviceName,
                serviceMakerCommand: $serviceMakerCommand,
            );

            return;
        }
    }

    protected function generateContract(string $serviceName, Command $serviceMakerCommand) {
        $serviceMakerCommand->call('make:servicecontractfile', [
            'name' => $serviceName
        ]);
    }
}
