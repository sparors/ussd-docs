---
title: Running the App
description: Smart Worker
extends: _layouts.documentation
section: content
---
# Creating Machine {#creating-machince}

Typically, machines are created in a controller or in your routes file.

Use the Ussd Facade and call the function machine. That's all it takes.

```php
Ussd::machine();
```

## Session id

Machine Requires a session id to work. You can set it on the machine call like this.

```php
Ussd::machine()->setSessionId($request->session_id);

// or

Ussd::machine()->setSessionIdFromRequest('sesssion_id');
```

## UserInput

Another important variable is user input. You can set it like this.

```php
Ussd::machine()->setInput($request->user_input);

// or 

Ussd::machine()->setInputFromRequest('user_input');
```

## Other parameters

Other parameters like phoneNumbe and network are also available to set when needed.

```php
Ussd::machine()->setPhoneNumber($request->phone_number);
Ussd::machine()->setNetwork($request->network);

// or 

Ussd::machine()->setPhoneNumberFromRequest('phone_number');
Ussd::machine()->setNetworkFromRequest('network');
```

## Parameters can be chained

```php
Ussd::machine()->setPhoneNumber($request->phone_number)->setNetworkFromRequest('network');
```

## Rarameters can be set at once

```php
Ussd::machine()->set([
    'phone_number' => $request->phone_number,
    'network' => $request->operatorNetwork,
    'session_id' => $request->sessionID,
    'input' => $request->user_input,
]);

// or

/* 
    When key from request can be converted to the same camel
    as phoneNumber, network, sessionId, input, then
    there is no need to use associative array.
    on the value is enough.
*/
Ussd::machine()->setFromRequest([
    'phone_number',
    'input' => 'user_input',
    'network',
    'session_id',
]);
```

## Choose cache store

When you don't specify the cache store, the store variable in *config/ussd.php* is used. When not specified, the machine uses the specified one. But you can override that with setStore.

```php
Ussd::machine()->setStore('redis');
```

## Initial State

The machine can not run without tell it where to start from. Import a state class of your choice and pass it to the setInitialState method

```php
Ussd::machine()->setInitialState(Welcome::class);
```

## Output of the machine

The machine generates an array as output with two properties `message` and `code`. The message is title of the menu/page displayed to the user and the code determines how a page will be displayed to the user.

```php
<?php

use Illuminate\Support\Facades\Route;
use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\Welcome;

Route::get('/', function () {
    $ussd = Ussd::machine()
        ->setFromRequest([
            'phone_number',
            'input' => 'user_input',
            'network', 'session_id',
        ])
        ->setInitialState(Welcome::class);

    return response()->json($ussd->run());
});

/*
    output

    {
        "message": "Welcome class over here"
        "code": 1
    }
*/
```

> NB: code 1 for input, 2 for no input.

## What if my operatory does not understand that response?

Don't worry, we know you can not tell your ussd operator to change their structure just to make your application work. You can set how to responsed to your operator by using a callable. See the example below.

```php
<?php

use Illuminate\Support\Facades\Route;
use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\Welcome;

Route::get('/', function () {
    $ussd = Ussd::machine()
        ->setFromRequest([
            'phone_number' => 'msisdn',
            'input' => 'msg',
            'network',
            'session_id' => 'UserSessionID',
        ])
        ->setInitialState(Welcome::class)
        ->setResponse(function(string $message, int $code) {
            return [
                'USSDResp' => [
                    'action' => $code === 2 ? 'prompt' : 'input',
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
