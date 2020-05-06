---
title: Understanding States
description: Go deeper into states
extends: _layouts.documentation
section: content
---
# Understanding States {#understanding-states}

This is a sample State class generated:

```php
<?php

namespace App\Http\Ussd;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        //
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
```

## The *beforeRendering* Method {#before-rendering-method}

This method is where ussd menus are constructed. You can perform other functions like saving data and retrieving it for later use.

## The *afterRendering* Method {#after-rendering-method}

The primary purpose of this method is for you to specify which state the user should see next after examining his/her input. The input is the param string argument passed to the method.
