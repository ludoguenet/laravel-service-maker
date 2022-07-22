<?php

namespace NordCoders\LaravelServiceMaker\Commands;

use Illuminate\Console\Command;

class LaravelServiceMakerCommand extends Command
{
    public $signature = 'laravel-service-maker';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
