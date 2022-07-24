<?php

use function Pest\Laravel\artisan;

it('returns a successful response when make:service command is executed without option', function () {
    artisan('make:service CreateUser')->assertExitCode(0);
});

it('returns a successful response when make:service command is executed with option', function () {
    artisan('make:service CreateUser --noContract')->assertExitCode(0);
});

it('is successful when make:servicecontractfile command is executed', function () {
    artisan('make:servicecontractfile CreateUser')->assertSuccessful();
});

it('is successful when make:servicefile command is executed', function () {
    artisan('make:servicefile CreateUser')->assertSuccessful();
});

it('is successful when make:servicewithnocontract command is executed', function () {
    artisan('make:servicewithnocontract CreateUser')->assertSuccessful();
});
