<?php

declare(strict_types=1);

namespace NordCoders\LaravelServiceMaker\Commands\Files\Service;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

final class CreateServiceFileCommand extends GeneratorCommand
{
    /**
     * @var string
     */
    protected $name = 'make:servicefile';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../../../stubs/service-with-contract.stub';
    }

    /**
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $serviceName = str(
                string: $this->argument('name')
            )
            ->ucfirst();

        return "{$rootNamespace}\\Services\\{$serviceName}";
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
        $serviceName = "{$name}Service";

        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $serviceName)
                    ->replaceClass($stub, $name);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $serviceName = "{$name}Service";
        $class = str_replace($this->getNamespace($serviceName).'\\', '', $serviceName);
        $contractName = str_replace($this->getNamespace($serviceName).'\\', '', $name).'Contract';
        $contractNamespace = $this->rootNamespace()."Services\\Contracts\\{$contractName}";

        $replace = [
            '{{ class }}' => $class,
            '{{class}}' => $class,
            '{{ contract }}' => $contractName,
            '{{contract}}' => $contractName,
            '{{ contractNamespace }}' => $contractNamespace,
            '{{contractNamespace}}' => $contractNamespace,
        ];

        return str_replace(array_keys($replace), array_values($replace), $stub);
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

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name.'Service').'.php';
    }
}
