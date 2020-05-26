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

### Available Methods {#decision-methods}

<div class="space-y-1">
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-equal" class="inline-block ml-2">
            equal
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-numeric" class="inline-block ml-2">
            numeric
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-integer" class="inline-block ml-2">
            integer
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-amount" class="inline-block ml-2">
            amount
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-length" class="inline-block ml-2">
            length
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-phonenumber" class="inline-block ml-2">
            phoneNumber
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-between" class="inline-block ml-2">
            between
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-in" class="inline-block ml-2">
            in
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-custom" class="inline-block ml-2">
            custom
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#decision-method-any" class="inline-block ml-2">
            any
        </a>
    </div>
</div>

#### equal {#decision-method-equal}

`equal` method compares the users input and set the output when there match. You can ensure variable type is compare by setting the strict parameter to true.

```php
// public function equal($argument, string $output, bool $strict = false): self

$this->decision->equal('1', Airtime::class);
```

#### numeric {#decision-method-numeric}

`numeric` method check is the input is numeric then set the outcome.

```php
// public function numeric(string $output): self

$this->decision->numeric(Airtime::class);
```

#### integer {#decision-method-integer}

`integer` method check is the input is a integer then set the outcome.
```php
// public function integer(string $output): self

$this->decision->integer(Airtime::class);
```

#### amount {#decision-method-amount}

`amount` method check is the input is a valid amount then set the outcome

```php
// public function amount(string $output): self

$this->decision->amount(Airtime::class);
```

#### length {#decision-method-length}

`length` method check the length of the input with and compares it with an argument and set the output

```php
// public function length($argument, string $output): self

$this->decision->length('5', Airtime::class);
```

#### phoneNumber {#decision-method-phonenumber}

`phoneNumber` method check the  the input is a valid phoneNumer and set the output

```php
// public function phoneNumber(string $output): self

$this->decision->phoneNumber(Airtime::class);
```

#### between {#decision-method-between}

`between` method check if the input is in a specified range and set the output

```php
// public function between(int $start, int $end, string $output): self

$this->decision->between(1, 10, Airtime::class);
```

#### in {#decision-method-in}

`in` method check if the input is in a given array and set the output

```php
// public function in(array $array, string $output, bool $strict = false): self

$this->decision->in([2, 4, 6, 8, 10], Airtime::class);
```

#### custom {#decision-method-custom}

`custom` method check allows you to execute a callable which accepts one 
argument which will be the users input

```php
// public function custom(callable $function, string $output): self

// Checking if input is a url
$this->decision->custom(function ($user_input) {
    return is_string($user_input) && substr($user_input,0, 4) === 'http';
}, Airtime::class);
```

#### any {#decision-method-any}

`any` method simple set the output no matter the input

```php
// public function any(string $output): self

$this->decision->any(Airtime::class);
```

### Methods can be chained {#decision-method-chained}

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