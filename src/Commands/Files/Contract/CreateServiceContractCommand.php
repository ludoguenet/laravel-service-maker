<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Commands\Files\Contract;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

final class CreateServiceContractCommand extends GeneratorCommand
{
    /**
     * @var string
     */
    protected $name = 'make:servicecontractfile';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../../../stubs/service-contract.stub';
    }

    /**
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\Services\\Contracts";
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $contractName = "{$name}Contract";

        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $contractName)
                    ->replaceClass($stub, $contractName);
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name.'Contract').'.php';
    }
}
