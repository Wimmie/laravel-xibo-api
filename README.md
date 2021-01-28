# A Laravel package for using the Xibo api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wimmie/laravel-xibo-api.svg?style=flat-square)](https://packagist.org/packages/wimmie/laravel-xibo-api)
[![Total Downloads](https://img.shields.io/packagist/dt/wimmie/laravel-xibo-api.svg?style=flat-square)](https://packagist.org/packages/wimmie/laravel-xibo-api)


A wrapper for the Xibo api, see https://xibo.org.uk/manual/api/ as well.

## Installation

You can install the package via composer:

```bash
composer require wimmie/laravel-xibo-api
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Wimmie\XiboApi\XiboApiServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('XIBO_URL', ''),
    'client_id' => env('XIBO_CLIENT_ID', ''),
    'client_secret' => env('XIBO_CLIENT_SECRET', ''),
];
```

## Usage

```php
$xiboApi = new Wimmie\XiboApi();
echo $xiboApi->misc()->about();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Willem](https://github.com/wimmie)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
