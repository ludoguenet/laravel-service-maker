<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Contracts;

use Illuminate\Console\Command;

interface CreateServiceContractFileActionContract
{
    public function handle(
        string $serviceName,
        string|bool $noContract,
        Command $serviceMakerCommand
    ): void;
}
