---
title: State
description: Introduction to States
extends: _layouts.documentation
section: content
---
# States {#states}

When a user dials a USSD shortcode. E.g. (*392#). A menu is presented to
him/her. There may or may not be an input field. If there is an input field,
the user is expected to enter some text to take him to another state. 
All the views a user sees as he navigates through the USSD application are 
referred to as States.

## Creating States {#creating-states}

Laravel uses PSR-4 autoloading to load all the resources in the 
*project/app* directory. That means you don't have to manually require, 
include it or discover it with `composer dump-autoload`. 
You are expected to put your application logic in this directory. 
You can create states in the *project/app* directory or under any sub 
directory. How deep they are nested does not matter.

### Meet the Artisan State Command {#state-command}

We provide a ussd artisan command which allows you to quickly create new states.

```bash
php artisan ussd:state Welcome
```

This will generate a class called Welcome.php in *app/Http/Ussd/States* 
directory. If the directory does not exist, it will be created for you.

### Why in *app/Http/Ussd/States* {#state-directory}

That is the default root directory specified in *config/ussd.php*. 
If the configuration file does not exist, you can publish it, 
[see](../installation#installation-config).

To change the default directory to *app/Ussd* change the 
*state_namespace* variable in the configuration to `App\\Ussd` 
before running the command.

### Nested States {#state-nesting}

Your default directory is *app/Http/Ussd/States* but you want 
some states nested. No need to be changing configurations. 
For example, if you want to create Amount.php state class in 
*app/Http/Ussd/States/Airtime*. Just specify the relative path like this:

Linux/Unix

```bash
php artisan ussd:state airtime/amount
```

Windows

```bash
php artisan ussd:state airtime\amount
```

### Why are the directory and class starting with caps. {#state-directory-convention}

Take a good look are the file structure in app. That the format they 
all use. It simple convention and we ensure you stick with that, 
so if enter airtime/amount for Airtime/Amount, w
e just fix that for you. Isn't it cool?

## Understanding States {#understanding-states}

This is a sample State class generated:

```php
<?php

namespace App\Http\Ussd\States;

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

### State Properties {#state-properties}

Every state class has the following properties:

<div class="space-y-1">
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#state-property-action" class="inline-block ml-2">
            action
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="../record#record" class="inline-block ml-2">
            record
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="../menu#menus" class="inline-block ml-2">
            menu
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="../decision#decision" class="inline-block ml-2">
            decision
        </a>
    </div>
</div>

The rest of the property will be explained in a later section apart from
`action`.

### Action {#state-property-action}

Action help to determine weather the state should display an input for response
or no input (usually the last state).

#### Setting action {#state-property-action-use}

```php
<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected $action = self::PROMPT; // for prompt (without input)
    // for input use self::INPUT 
    // but since input is default, you can decide not to specify.
}
```

### State Methods {#state-methods}

State has the following abstract methods

<div class="space-y-1">
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#before-rendering-method" class="inline-block ml-2">
            beforeRendering
        </a>
    </div>
    <div class="flex items-center">
        <svg class="w-6 h-6 fill-current text-blue-700 bg-blue-200 rounded-full p-1" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <a href="#after-rendering-method" class="inline-block ml-2">
            afterRendering
        </a>
    </div>
</div>

#### The *beforeRendering* Method {#before-rendering-method}

This method is where ussd menus are constructed. You can perform other 
functions like saving data and retrieving it for later use. 
This is where you use `menu` and `record` property. [See](../menu#creating-menus)

#### The *afterRendering* Method {#after-rendering-method}

This primary purpose of this method is to given you the privilege to 
specify which state the user should see next after examining his input. 
The input is the param string argument passed to the method.
This is where you use `decision` and `record` property. [See](../decision#using-decision)