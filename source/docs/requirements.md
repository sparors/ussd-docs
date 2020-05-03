---
title: Requirements
description: Dependencies need to succcessly use library
extends: _layouts.documentation
section: content
---
# Requirements {#requirements}

Laravel Ussd Package requires **PHP 7.2+** and **Laravel 5.5.0+**

This package uses Laravel Cache to store data. This means the type of cache to use depends on your application's need, personal preferences or server restriction. Extending the cache to use other drivers will still work with the library.

## Cache Requirements {#cache-requirements}

### Database {#cache-requirements-database}

To use the database cache, ensure that the extensions required for the chosen database is installed and enabled. Laravel Current supports 4 databases MySql, PostgreSQL, SQLite and SQL Server.

Create the following schema in your database.

``` php
Schema::create('cache', function ($table) {
    $table->string('key')->unique();
    $table->text('value');
    $table->integer('expiration');
});
```

> You can easily do that with `php artisan cache:table`.

### Memcached {#cache-requirements-memcached}

This requires Memcached driver from [Memcached PECL package](https://pecl.php.net/package/memcached) to be installed.

### Redis {#cache-requirements-redis}

To use Redis cache, you will need to install either PhpRedis PHP extension via PECL or install the `predis/predis` package(~1.0) via composer.

## Read More {#cache-requirements-read-more}

If your are not familiar with the laravel cache stores, you can read more at the [official site](https://laravel.com/docs/7.x/cache).

