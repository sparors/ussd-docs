---
title: Record
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Record {#record}

Every new session has different a session id. Record helps to save data for a 
particular request since it ties it self with the request id. Data can be 
saved on any state and retrieved on another state provided they 
have the same session id.

## How it works? {#record-how}

Record connects with the cache of your choice and saves the data to cache. 
Since caches are faster than databases, they help to speed up the response 
time of ussd applications since the ussd gateway timeout if response delays. 
The unique identifier to your store is the session id, when it is not set, 
an exception will be thrown.

## Why the need for record? {#record-why}

It is impossible to collect data from users with just a state. You will have 
to have a series of states presented as a form that the user can fill. 
Data collected will have to be saved and used at a later date, 
hence the need for the record.

## Manipulating Data {#record-manipulating-data}

The ussd state class has a property `$record` which is an instance 
of `Sparors\Ussd\Record` class. This will help you save, update, 
retrieve or delete data when the need arises.

### Saving Data {#record-saving-data}

To save data use the set method of the record class.

```php
$this->record->set('name', 'Benjamin');
```

#### Saving Multiple Data {#record-saving-multiple}

To save multiple data at onces use the setMuliple

```php
$this->record->setMultiple(['name' => 'Isaac', 'age' => 17, 'amount' => 3.50]);
```

#### Automatic Expiration {#record-auto-expire}

Sometimes, you don't want your cache to be filled with state data.
You will want to automatically delete the old data.
Set the expiration time you want in seconds.

```php
$this->record->set('name' => 'Isaac', 86400); // One day in seconds
```

You can also use datetime instead

```php
$this->record->setMultiple(['name' => 'Isaac', 'age' => 17, 'amount' => 3.50], now()->addDays(7));
```

#### Saving Data with Magic Method {#record-save-magic}

You can dynamically save data with record by assigning values to a property.
The property name will become the key used to save the value in the cache.

```php
// single value
$this->record->name = 'Timothy';

// multiple values
$this->record(['name' => 'Timothy', 'age' => 17]);
```

> NB: The TTL of magic methods are taken from `config/ussd.php`.
[See](../installation#installation-config-understanding)

#### Updating Data {#record-save-update}

When you set a record that already exists, the value is overwritten in the cache.

```php
$this->record->set('name', 'Tom');

$this->record->set('name', 'Jerry'); // Tom will update to Jerry.
```

### Check Data Exist {#record-has-data}

To check if a record is set and not null, use the has method

```php
if ($this->record->has('name')) {
    echo "Name Already Set";
} else {
    echo "Name Not Set";
}
```

### Retrieve Data {#record-retrieve-data}

Use the get method to retrieve saved data. Null will be returned when key not found

```php
$name = $this->record->get('name');
```

#### Retrieve Multiple Data {#record-retrieve-multiple}

You can retrieve more than one day at a go.

```php
[$name, $age] = $this->record->getMultiple(['name', 'age']);
```

#### Setting default {#record-retrieve-default}

Sometimes, you want to get something else when data can not be found instead of null. You can set the default value.

```php
$name = $this->record->get('name', 'Ussd User');

[$balanceBefore, $balanceAfter] = $this->record->getMultiple(['balance_before', 'balance_after'], 0.00);
```

#### Retrieve Data with magic method {#record-retrieve-magic}

You can retrieve data with magic methods using the key of value
as the property of record.

```php
$name = $this->record->name;

// or 

$age = $this->record('age');
```

> NB: The default value of magic methods are taken from `config/ussd.php`.
[See](../installation#installation-config-understanding)

### Deleting Data {#record-delete-data}

To delete single records use the delete method

```php
$this->record->delete('name');
```

#### Delete Multiple Data {#record-delete-multiple}

To delete more than one at a time, use setMultiple

```php
$this->record->deleteMultiple(['name', 'age']);
```