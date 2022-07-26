<p align="center"><img src="./laravel-service-maker.png" alt="Laravel Service Maker"></p>

<p align="center">
    <a href="https://packagist.org/packages/nordcoders/laravel-service-maker">
        <img src="https://img.shields.io/packagist/dt/nordcoders/laravel-service-maker" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/nordcoders/laravel-service-maker">
        <img src="https://img.shields.io/packagist/v/nordcoders/laravel-service-maker" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/nordcoders/laravel-service-maker">
        <img src="https://img.shields.io/packagist/l/nordcoders/laravel-service-maker" alt="License">
    </a>
</p>

## What does it do?

This package adds a new `php artisan make:service {name} {--N|noContract}` command. It will create a service file and its contract (interface) for saving time while working with Laravel Framework and benefit from the **Service Pattern**.

## Installation

You can install the package via composer:

```bash
composer require nordcoders/laravel-service-maker --dev
```

## How does it work?

After installation, the command `php artisan make:service {name} {--N|noContract}` will be available.

### Create services files

For example, the command `php artisan make:service createUser` will generate a service file called `CreateUserService.php` located in `app/Services/CreateUser`.

It will also generate an interface (contract) called `CreateUserContract.php` located in `app/Services/Contracts`.

### Create services for models

Adding a ```--service``` or ```-S``` option is now available when creating a model.

For example, the command `php artisan make:model Book --service` or `php artisan make:model Book -S` will generate a model with service too.

The command `php artisan make:model Book --all` or `php artisan make:model Book -a` will now generate a model, migration, factory, seeder, policy, controller, form requests and service.

### Contracts

Adding a ```--noContract``` or ```-N``` option will prevent the commands from implementing any contract and will not create any contract file.

If you never need any contracts. Publish the config file and then turn the **with_interface** value to false in the config file.

## Configuration file

You can publish the config file with:

```bash
php artisan vendor:publish --tag="service-maker-config"
```

This is the content of the published config file:

```php
return [
    'with_interface' => true,
];
```

## Credits

- [Ludovic Guénet](https://github.com/ludoguenet)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
