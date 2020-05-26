---
title: Machine
description: Introduction to Machine
extends: _layouts.documentation
section: content
---
# Machine {#machine}

After creating the various states and linking them, we are set to launch our 
ussd application. State classes are interconnected web of nodes but 
does not have any idea on how to run.

What do i do next?

Meet Machine, the robust application runner.

## How does it work? {#machine-how}

Machine takes arguments which are crusial to run the application when created.
It does all the magic for you while you sit back and relax.

Machine will take the users request and interpret it and call the necessary 
state class to hand over the request and terminate it afterwards. 
Machine is responsible for navigating the states with the user.

## Seem complex? {#machine-complex}

Don't worry, it is easier than it sound. Let's create a machine to prove it.

## Creating Machine {#creating-machine}

Typically, machines are created in a controller or in your routes file.

Use the Ussd Facade and call the function machine. That's all it takes.

```php
<?php
use Sparors\Ussd\Facade\Ussd;

Ussd::machine();
```

### Session id {#machine-session-id}

Machine Requires a session id to work. You can set it on the 
machine call like this.

```php
Ussd::machine()->setSessionId($request->session_id);
```

#### Session id from request {#machine-session-id-req}

You may want to set the session id straight for the request without having 
to use a request object. To achieve this, call 
setSessionIdFromRequest and specify the request key.

```php
Ussd::machine()->setSessionIdFromRequest('sesssion_id');
```

### User Input {#machine-input}

Another important variable is the Input from the user. That too can be set like the session id.

```php
Ussd::machine()->setInput($request->user_input);

// or 

Ussd::machine()->setInputFromRequest('user_input');
```

### Other parameters {#machine-other-params}

Other parameters like phoneNumber and network are also available to set when needed.

```php
Ussd::machine()->setPhoneNumber($request->phone_number);
Ussd::machine()->setNetwork($request->network);

// or 

Ussd::machine()->setPhoneNumberFromRequest('phone_number');
Ussd::machine()->setNetworkFromRequest('network');
```

### Parameters can be chained {#machine-chained}

```php
Ussd::machine()->setPhoneNumber($request->phone_number)->setNetworkFromRequest('network');
```

### Parameters can be set at once {#machine-set}

```php
Ussd:machine()->set([
    'phone_number' => $request->phone_number,
    'network' => $request->operatorNetwork,
    'session_id' => $request->sessionID,
    'input' => $request->user_input,
]);

// or

/* 
    Keys are converted to camel-case.
    The available key options are:
    phoneNumber, input, network, sessionId
*/
Ussd:machine()->setFromRequest([
    'phone_number', // Get request with key phone_number and set it as phoneNumber
    'input' => 'user_input', // Get request with key user_input and set it as the input
    'network',
    'session_id',
]);
```

### Choose cache store {#machine-store}

When you don't specify the cache store, the store variable in *config/ussd.php* is used. When specified the machine uses the specified one. To specify, use `setStore` method.

```php
Ussd:machine()->setStore('redis');
```

### Initial State {#machine-state-init}

The machine can not run without tell it where to start from.
When you do, the other states will be determined from user interraction 
with the USSD.

```php
Ussd:machine()->setInitialState(Welcome::class);
```

### Output of the machine {#machine-output}

The machine will generate an array as the out put with two property `message` and `code`. The message is the string to be responsed to the mobile operator and the code show weather to provide an input or not to the user.

```php
<?php

use Illuminate\Support\Facades\Route;
use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\States\Welcome;

Route::get('/', function () {
    $ussd = Ussd::machine()
        ->setFromRequest([
            'phone_number',
            'input' => 'user_input',
            'network',
            'session_id',
        ])
        ->setInitialState(Welcome::class);

    return response()->json($ussd->run());
});

/*
    output

    {
        "message": "Welcome class over here"
        "action": "input"
    }
*/
```

> NB: action `'input'` for input, `'prompt'` for no input.

### What ! my operatory does not understand that response {#machine-out-manupulate}

Don't worry, we know you can not tell your ussd operator to change their 
structure just to make your application work. You can set how to responsed 
to your operator by using a callable. Below is an example.


```php
<?php

use Illuminate\Support\Facades\Route;
use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\States\Welcome;

Route::get('/', function () {
    $ussd = Ussd::machine()
        ->setFromRequest([
            'phone_number' => 'msisdn',
            'input' => 'msg',
            'network',
            'session_id' => 'UserSessionID',
        ])
        ->setInitialState(Welcome::class)
        ->setResponse(function(string $message, string $action) {
            return [
                'USSDResp' => [
                    'action' => $action,
                    'menus' => '',
                    'title' => $message,
                ];
            ];
        });

    return response()->json($ussd->run());
});

/*
    output
    
    {
        "USSDResp": {
            "action": "input",
            "menus": "",
            "title": "Welcome class over here"
        }
    }
*/
```
