---
title: Record
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Record {#record}

Every new session has different a session id. Record helps to save data for a particular request since it ties it self with the request id. Data can be saved on any state and retrieved on another state provided they have the same session id.

## How it works?

Record connects with the cache of your choice and saves the data to cache. Since caches are faster than databases, they help to speed up the response time of ussd applications since the ussd gateway timeout if response delays. The unique identifier to your store is the session id, when it is not set, an exception will be thrown.

## Why the need for record?

It is impossible to collect data from users with just a state. You will have to have a series of states presented as a form that the user can fill. Data collected will have to be saved and used at a later date, hence the need for the record.