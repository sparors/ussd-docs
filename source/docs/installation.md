---
title: Installation
description: How to install and Setup the library
extends: _layouts.documentation
section: content
---
# Installation {#installation}

You can install the package via composer:

```bash
composer require sparors/laravel-ussd
```

## Publish Configuration {#installation-config}

Laravel Ussd provides zero configuration out of the box. To publish the config, 
run the vendor publish command:

```bash
php artisan vendor:publish --provider="Sparors\Ussd\UssdServiceProvider" --tag=ussd-config
```

This is the default content of the config file:

```php
<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | State Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Ussd State component classes in
    | your application.
    |
    */

    'state_namespace' => env('USSD_STATE_NS', 'App\\Http\\Ussd\\States'),

    /*
    |--------------------------------------------------------------------------
    | Action Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Ussd Action component classes in
    | your application.
    |
    */

    'action_namespace' => env('USSD_ACTION_NS', 'App\\Http\\Ussd\\Actions'),

     /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    | This value sets the default store to use for the ussd record.
    | The store can be found in your cache stores config
    |
    */

    'cache_store' => env('USSD_STORE', null),


    /*
    |--------------------------------------------------------------------------
    | Time to live
    |--------------------------------------------------------------------------
    |
    | This value sets the default for how long the record values are to
    | be cached in your application when not specified.
    |
    */

    'cache_ttl' => env('USSD_TTL', null),

    /*
    |--------------------------------------------------------------------------
    | Default value
    |--------------------------------------------------------------------------
    |
    | This value return the default store value when a given cache key
    | is not found
    |
    */

    'cache_default' => env('USSD_DEFAULT_VALUE', null),
];
```
## Understanding the Configuration {#installation-config-understanding}

By default new state classes will be created in
`project/app/Http/Ussd/State directory` with `App\Http\Ussd\States` namespace.
That can be changed with the *state_namespace* variable in **ussd/config.php**.

Also a new action with `App\Http\Ussd\Actions` namespace by default.
You can change it just like the states.

The `store` variable specifies which particular store to use.
The list can be found in **config/cache.php** under the `stores` array variable.
Leave it at null to use your default cache-store.

When using the magic methods of a record class to save data
*(to be spoken of later)*, you can not specify the TTL option for the cache,
the `cache_tll` variable sets the default value.

`cache_default` variable also specifies the default value to return when a
particular key can not be found in the cache when accessed using the magic
methods of a record class *(to be spoken of later)*.