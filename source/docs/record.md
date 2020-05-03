---
title: Record
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Record {#record}

Record helps to save data for a particular request. It ties it self with the request id since every new session has  different session id. Data can be save on any state and retrieve on another state provided they have the same session id.

## How it works ?

Record connects with the cache of your choice and saves the data over there. Since caches are faster than database, they help to speed up the response time of ussd since the ussd gateway has will timeout if response delays. The unique identifier to your store is the session id, when it not set, an exception will be thrown.

## Why need the record ?

It normally not possible to take data from users with just a state. You will have to have a series of states presented as a form that the user fill. Data collected during that time will have to be saved and used at a later date, hence the need for the record.