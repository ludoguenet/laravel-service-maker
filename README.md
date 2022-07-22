# Laravel Services Maker 📦

## Description

This tiny package will generate services and their contracts for saving time while working with Laravel Framework.

## Example

The command `php artisan make:service CreateUser` creates two files.

The first will be located as `app/Services/CreateUser/CreateUserService.php`
and implements the `app/Services/Contracts/CreateUserContract.php` which is generated too.

## Contracts

If you do not need contracts implemented with your services. Then switch the **with_interface** value to false in the config file.

## Installation

You can install the package via composer:

```bash
composer require nordcoders/laravel-services
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="service-maker-config"
```

## Credits

- [Ludovic Guénet](https://github.com/ludoguenet)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
