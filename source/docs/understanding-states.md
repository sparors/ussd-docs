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

In this method provides you with the opportunity to design your menu. You can decide to save some data and retrieve it later if there is a need.

## The *afterRendering* Method {#after-rendering-method}

This primary purpose if the method is the given you the privilege to specify which state the user should see next after examining his input, The input is the param string argument passed to the method.