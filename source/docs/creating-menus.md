---
title: Creating States
description: Quickly Scafford States
extends: _layouts.documentation
section: content
---
# Creating Menus {#creating-menus}

Menus are created in the state class. The state class has a $menu property which is an instance of `Sparors\Ussd\Menu`. The class provides you with a simple api to create common menus.

## Available Methods

- text
- line
- lineBreak
- listing
- paginateListing

### text

*text* method appends a given text to the menu

```php
<?php

namespace App\Http\Ussd;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Hello World');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}

// 'Hello World'
```

### line

*line* method appends a given text to the menu with line break

```php

$this->menu->line('Hello World');

// "Hello World\n"
```

### lineBreak

*lineBreak* method appends a line break to the menu.
```php
$this->menu->lineBreak();

// "\n"

$this->menu->lineBreak(3);

// "\n\n\n"
```

### listing

*listing* method appends an array of items to the menu

```php
$this->menu->listing(['Buy Airtime', 'Buy Data']);

// "1.Buy Airtime\n2.Buy Data"

$this->menu->listing(['Buy Airtime', 'Buy Data'], ')');

// "1)Buy Airtime\n2)Buy Data"

$this->menu->listing(['Buy Airtime', 'Buy Data'], ')', "\n\n");

// "1)Buy Airtime\n\n2)Buy Data"

$this->menu->listing(['Buy Airtime', 'Buy Data'], ')', "\n\n", 'alphabetic_lower');

// "a)Buy Airtime\n\nb)Buy Data"
```

### paginateListing

*paginateListing* method paginates an array of item and append it to the menu

```php
$this->menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 1, 2);

// "1.Buy Airtime\n2.Buy Data"

$this->menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 2, 3, ')');

// "4)Invest"

$this->menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 2, 2, ')', "\n\n");

// "3)Pay Bills\n\n4)Invest"

$this->menu->paginateListing(['Buy Airtime', 'Buy Data', 'Pay Bills', 'Invest'], 1, 2, ')', "\n\n", 'alphabetic_lower');

// "a)Buy Airtime\n\nb)Buy Data"
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
        //
    }
}

// "Welcome to Laravel Ussd\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```
