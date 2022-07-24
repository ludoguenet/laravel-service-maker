<?php

use function Pest\Laravel\artisan;

it('returns a successful response when make:service command is executed', function () {
    artisan('make:service CreateUser')->assertExitCode(1);
});
