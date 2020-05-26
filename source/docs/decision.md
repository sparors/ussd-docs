---
title: Decision
description: Introduction to Decision
extends: _layouts.documentation
section: content
---
# Decisions {#decision}

Users are excepted to input their response when a menu is displayed to them 
provide there is an input field in the state. As a developer, you 
make decisions based on the users responses. You will then navigate him/her 
to a different state based on the outcome of the decision. 
This is what decisions help you to do.

## Why decisions? {#decisions-why}

Decisions provide you with common and frequently used logics to navigate 
to different states. This makes you focus on your applications instead of 
creating functions for every application you build.

## Creating Links with decision {#using-decision}

A decision instance is already provided in the state class. There is a `$decision` property, an instance of `Sparors\Ussd\Menu`. The class provide you with simple and needed functions for selecting the next class.

### Available Methods

- equal
- numeric
- integer
- amount
- length
- phoneNumber
- between
- in
- custom
- any

#### equal

`equal` method compares the users input and set the output when there match. You can ensure variable type is compare by setting the strict parameter to true.

```php
$this->decision->equal('1', Airtime::class);
```

#### numeric

`numeric` method check is the input is numeric then set the outcome.

```php
$decision->numeric(Airtime::class);
```

#### integer

`integer` method check is the input is a integer then set the outcome.
```php
$decision->integer(Airtime::class);
```

#### amount

`amount` method check is the input is a valid amount then set the outcome

```php
$decision->integer(Airtime::class);
```

#### length

`length` method check the length of the input with and compares it with an argument and set the output

```php
$decision->length('5', Airtime::class);
```

#### phoneNumber

`phoneNumber` method check the  the input is a valid phoneNumer and set the output

```php
$decision->phoneNumber(Airtime::class);
```

#### between

`between` method check if the input is in a specified range and set the output

```php
$decision->between(1, 10, Airtime::class);
```

#### in

`in` method check if the input is in a given array and set the output

```php
$decision->in([2, 4, 6, 8, 10], Airtime::class);
```

#### custom

`custom` method check allows you to execute a callable which accepts one 
argument which will be the users input

```php
// Checking if input is a url

$decision->custom(function ($user_input) {
    return is_string($user_input) && substr($user_input,0, 4) === 'http';
}, Airtime::class);
```

#### any

`any` method simple set the output no matter the input

```php
$decision->any(Airtime::class);
```

### Methods can be chained

```php
<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function afterRendering(string $argument): void
    {
        $this->decision->equal('1', Airtime::class)
                       ->between(2, 4, Payment::class)
                       ->in(['9', '#'], Wait::class)
                       ->any(Error::class);
    }
}

// "Welcome to Laravel Ussd\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```