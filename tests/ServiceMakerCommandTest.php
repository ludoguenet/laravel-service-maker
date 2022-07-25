<?php

declare(strict_types=1);

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

it('is successful to create a Model', function () {
    artisan('make:model User')->assertSuccessful();
});

it('is successful to create a Model with --service as option', function () {
    artisan('make:model User --service')->assertSuccessful();
});

it('is successful to create a Model with --service --noContract as option', function () {
    artisan('make:model User --service --noContract')->assertSuccessful();
});

it('is successful to create a Model with -S as option', function () {
    artisan('make:model User -S')->assertSuccessful();
});

it('is successful to create a Model with -SN as option', function () {
    artisan('make:model User -SN')->assertSuccessful();
});

it('is successful to create a Model with -S -N as option', function () {
    artisan('make:model User -S -N')->assertSuccessful();
});

it('is successful to create a Model with --service -N as option', function () {
    artisan('make:model User --service -N')->assertSuccessful();
});

it('is successful to create a Model with -S --noContract as option', function () {
    artisan('make:model User -S --noContract')->assertSuccessful();
});
