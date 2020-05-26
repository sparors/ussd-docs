---
title: Menu
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Menus {#menus}

Menus are two-way flash messages;
the user enters an input in response to the menu. Ideal for surveys, votes and
customer feedback.

## How is it created? {#menu-how}

Unlike a website where you define the content with a makeup language. Ussd 
does not provide you with that luxury. All your menus are strings 
including lists.

### Example menu {#menus-example}

Suppose you want to create a menu like this:

```txt
Welcome to Laravel Ussd

Select an option
1. Buy Airtime
2. Buy Data
3. Pay Bills

9. Next Page
#. Back
0. Main Menu
```

You will have to defined it as such

```php
"Welcome to Laravel Ussd\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```

### Why need the menu? {#menu-why}

Suppose you are getting the list from an API, you have to get the list, 
loop and append to the string. Don't forget you may have to paginate 
since there is a limit to the number of characters the phone can display. 
That may not be the only list in your application. Hard coding will 
make your application hard to maintain.

Just focus on how you want your menu to look, we take care of the 
hassle for you.

## Creating Menus {#creating-menus}

Menus are created in the state class. The state class has a `$menu` property 
which is an instance of `Sparors\Ussd\Menu`. The class provide you with simple api to create common menus.

## Available Methods {#menu-methods}

- text
- line
- lineBreak
- listing
- paginateListing

### text {#menu-method-text}

`text` method appends a given text to the menu

```php
$menu->text('Hello World');

// 'Hello World'
```

### line {#menu-method-line}

`line` method appends a given text to the menu with line break

```php
$menu->line('Hello World');

// "Hello World\n"
```

### lineBreak {#menu-method-linebreak}

`lineBreak` method appends a line break to the menu.
```php
$menu->lineBreak();

// "\n"

$menu->lineBreak(3);

// "\n\n\n"
```

### listing {#menu-method-listing}

`listing` method appends an array of items to the menu

```php
$menu->listing(['Buy Airtime', 'Buy Data']);

// "1.Buy Airtime\n2.Buy Data"

$menu->listing(['Buy Airtime', 'Buy Data'], ')');

// "1)Buy Airtime\n2)Buy Data"

$menu->listing(['Buy Airtime', 'Buy Data'], ')', "\n\n");

// "1)Buy Airtime\n\n2)Buy Data"

$menu->listing(['Buy Airtime', 'Buy Data'], ')', "\n\n", 'alphabetic_lower');

// "a)Buy Airtime\n\nb)Buy Data"
```

### paginateListing {#menu-method-paginatelisting}

`paginateListing` method paginates an array of item and append it to the menu

```php
$menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 1, 2);

// "1.Buy Airtime\n2.Buy Data"

$menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 2, 3, ')');

// "4)Invest"

$menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 2, 2, ')', "\n\n");

// "3)Pay Bills\n\n4)Invest"

$menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 1, 2, ')', "\n\n", 'alphabetic_lower');

// "a)Buy Airtime\n\nb)Buy Data"
```

### Methods can be chained {#menu-chain-methods}

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
            ->paginateListing([
                'Buy Airtime',
                'Buy Data',
                'Pay Bills',
                'Invest']
                , 1, 3, '. ')
            ->lineBreak(2)
            ->line('9. Next Page')
            ->line('#. Back')
            ->line('Main Menu');
    }
}

// "Welcome to Laravel Ussd\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```
