---
title: Creating Links with decision
description: Connect all your states together
extends: _layouts.documentation
section: content
---
# Creating Links with decision {#using-decision}

A decision instance is already provided in the state class. There is a $decision property, an instance of `Sparors\Ussd\Menu`. The class provides you with simple and needed functions for selecting the next class.

## Available Methods

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

### equal

*equal* method compares the users input and set the output when they match. You can ensure the variable type is compared by setting the strict parameter to true.

```php
<?php

namespace App\Http\Ussd;

use App\Http\Ussd\Airtime;
use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Hello World');
    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->equal('1', Airtime::class);
    }
}
```

### numeric

*numeric* method checks if the input is numeric then set the outcome.

```php
$this->decision->numeric(Airtime::class);
```

### integer

*integer* method checks if the input is a integer then set the outcome.
```php
$this->decision->integer(Airtime::class);
```

### amount

*amount* method checks if the input is a valid amount then set the outcome

```php
$this->decision->integer(Airtime::class);
```

### length

*length* method checks the length of the input and compares it with an argument and set the output

```php
$this->decision->length('5', Airtime::class);
```

### phoneNumber

*phoneNumber* method checks if the input is a valid phoneNumer and set the output

```php
$this->decision->phoneNumber(Airtime::class);
```

### between

*between* method checks if the input is in a specified range and set the output

```php
$this->decision->between(1, 10, Airtime::class);
```

### in

*in* method checks if the input is in a given array and set the output

```php
$this->decision->in([2, 4, 6, 8, 10], Airtime::class);
```

### custom

*custom* method allows you to execute a callable which accepts one argument which will be the users input

```php
$this->decision->custom(function ($user_input) {
    return is_string($user_input) && substr($user_input,0, 4) === 'http';
}, Airtime::class);
```

### any

*any* method simply sets the output

```php
$this->decision->any(Airtime::class);
```

### Methods can be chained

```php
<?php

namespace App\Http\Ussd;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Welcome To Laravel Ussd')
                   ->lineBreak(2)
                   ->line('Select an option')
                   ->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 1, 3, '. ')
                   ->lineBreak(2)
                   ->line('9. Next Page')
                   ->line('#. Back')
                   ->line('Main Menu');
    }

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
