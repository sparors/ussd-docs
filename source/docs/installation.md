---
title: Installation
description: How to install and Setup the library
extends: _layouts.documentation
section: content
---
# Installation {#installation}

Laravel Ussd can be installed via composer:

```bash
composer require sparors/laravel-ussd
```

The package will automatically register a service provider.

## Publish Configuration {#installation-config}

Laravel Ussd aims for "zero-configuration" out-of-the-box, but we don't want to restrict your freedom.

You can publish Laravel Ussd's config file with the following artisan command:

```bash
php artisan vendor:publish --provider="Sparors\Ussd\UssdServiceProvider" --tag=config
```

This is the default content of the config file:

```php
<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Ussd State component classes in
    | your application.
    |
    */

    'class_namespace' => 'App\\Http\\Ussd',

     /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    | This value sets the default store to use for the ussd record.
    | The store can be found in your cache stores config
    |
    */

    'store' => null,


    /*
    |--------------------------------------------------------------------------
    | Time to live
    |--------------------------------------------------------------------------
    |
    | This value sets the default for how long the record values are to
    | be cached in your application when not specified.
    |
    */

    'cache_ttl' => null,

    /*
    |--------------------------------------------------------------------------
    | Default value
    |--------------------------------------------------------------------------
    |
    | This value return the default store value when a given cache key
    | is not found
    |
    */

    'cache_default' => null,
];
```

By default new state classes will be created in *project/app/Http/Ussd directory* with *App\Http\Ussd* namespace. That can be changed with the *class_namespace* variable in **ussd/config.php**.

The *store* variable specify which particular store to use. The list stores can be found in **config/cache.php** under the stores array variable. Leave it at null to use your default cache store.

When using the magic methods of record class to save data *(to be spoken of later)*, you can not specify the ttl option for the cache, the *cache_tll* variable sets the default value.

*cache_default* variable also specify the default value to return when a paricular key can not be found in the cache when accessed using the magic methods of record class *(to be spoken of later)*.