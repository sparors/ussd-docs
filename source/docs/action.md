---
title: Record
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Action {#action}

When user's enter input, there are two things to do:

- Take them to the next state
- Run an action to determine the next state

Actions are application logics you run at to determine what the next state
should be.

For instance, in a payment USSD application; You will want to
hit an api to do the payment and save the result in a database.
Then take the user to the next state depending on the outcome of your logic.

## Creating actions ?

You can create states manually or with an artisan provided by the package.

### Meet the Artisan Action Command {#action-command}

We provide a ussd artisan command which allows you to quickly create new actions.

```bash
php artisan ussd:action MakePayment
```

This will generate a class called MakePayment.php in 
*app/Http/Ussd/Actions* directory. If the directory does not exist,
 it will be created for you.

### Why in *app/Http/Ussd/Actions* {#action-directory}

That is the default root directory specified in *config/ussd.php*. 
If the configuration file does not exist, you can publish it, 
[see](../installation#installation-config).

To change the default directory to *app/Ussd* change the 
*action_namespace* variable in the configuration to `App\\Ussd` 
before running the command.

### Nested States {#action-nesting}

Your default directory is *app/Http/Ussd/Actions* but you want some 
actions nested. No need to be changing configurations. 
For example, if you want to create Payment/Airtime.php action class in 
*app/Http/Ussd/Actions/Payment*. 
Just specify the relative path like this:

Linux/Unix

```bash
php artisan ussd:state payment/airtime
```

Windows

```bash
php artisan ussd:state payment\airtime
```

### Why are the directory and class starting with caps. {#action-directory-convention}

Take a good look are the file structure in app. That the format they 
all use. It simple convention and we ensure you stick with that, 
so if enter payment/amount for Payment/Amount, w
e just fix that for you. Isn't it cool?

## Understanding Actions {#understanding-actions}

This is a sample Action class generated:

```php
<?php

namespace App\Http\Ussd\Actions;

use Sparors\Ussd\Action;

class MakePayment extends Action
{
    public function run(): string
    {
        return ''; // The state after this
    }
}
```

### Action Property {#action-property}

Every action class has one property `record` by default.

This is an instance of `Sparors\Ussd\Record` which help save and retrieve
saved data.

### Action Return Type {#action-return}

The return type of action should be a string. But this string should be a
fully qualified class name of the next state to display to the user.

### Action In Use {#action-in-use}

```php
<?php

namespace App\Http\Ussd\Actions;

use Sparors\Ussd\Action;
use App\Http\Ussd\States\PaymentSuccess;
use App\Http\Ussd\States\PaymentError;

class MakePayment extends Action
{
    public function run(): string
    {
        $response = Http::post('/payment', [
            'phone_number' => $this->record->phoneNumber
        ]);
        
        if ($response->ok()) {
            return PaymentSuccess::class;
        }
        return PaymentError::class;
    }
}
```



