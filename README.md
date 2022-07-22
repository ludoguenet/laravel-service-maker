# Laravel Services Maker 📦

## Description

This tiny package will generate services and their contracts for saving time while working with Laravel Framework.

## Example

The command `php artisan make:service CreateUser` creates two files.

The first one will be located as `app/Services/CreateUser/CreateUserService.php`
and implements the `app/Services/Contracts/CreateUserContract.php` which is generated too.

## Contracts

If for a specific service you don't need a contract, you can add the `--noContract` option flag to the the command.

If for some reason you do not need any contract with all your services, then turn the **with_interface** value to false in the config file.

## Installation

You can install the package via composer:

```bash
composer require nordcoders/laravel-service-maker
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="service-maker-config"
```

This is the contents of the published config file:

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
