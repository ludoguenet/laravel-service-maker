<?php

namespace NordCoders\LaravelServiceMaker\Commands;

use Illuminate\Console\Command;

class LaravelServiceMakerCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service you want to create.} {--noContract: Whether the service should have an interface.}';

    /**
     * @var string
     */
    protected $description = 'Create a service implementing its own interface.';

    /**
     * @var string
     */
    protected $type = 'Service';

    public function handle(): int
    {
        dd($this->option('noContract'));
        $this->call('make:servicefile', [
            'name' => $this->argument('name'),

        ]);

        if (config('service-maker.with_interface') || !$this->option('noContract')) {
            $this->call('make:servicecontractfile', [
                'name' => $this->argument('name'),
            ]);
        }

        $this->comment('Service files created with success!');

        return self::SUCCESS;
    }
}
