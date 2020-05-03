---
title: Manipulating Data
description: Make your ussd statefull
extends: _layouts.documentation
section: content
---
# Manipulating Data {#manipulating-data}

The ussd state class has a property $record which is an instance of `Sparors\Ussd\Record` class. This will help you save, update, retrieve or delete data when the need arises.

## Saving Data

To save data use the set method of the record class.

```php
<?php

namespace App\Http\Ussd;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $this->record->set('visited_record', true);
    }

    protected function afterRendering(string $argument): void
    {
        $this->record->set('visited_record_again', true);
    }
}
```

### Saving multiple data

To save multiple data at onces use the setMuliple

```php

$record->setMultiple(['name' => 'Isaac', 'age' => 17, 'amount' => 3.50]);

```

#### Automatic Expiration

Sometimes, you don't want your cache to be filled with stale data. You will want to automatically delete old data. Set the expiration time you want in seconds.

```php

$record->set('name' => 'Isaac', 86400); // One day in seconds

```

You can also use datetime instead
```php

$record->setMultiple(['name' => 'Isaac', 'age' => 17, 'amount' => 3.50], now()->addDays(7));

```

#### Updating Records

When you set a record that already exists, the value is overwritten in the cache.

```php
$record->set('name', 'Tom');

$record->set('name', 'Jerry'); // Tom will update to Jerry.
```

## Check Record exist

To check if a record is set and not null, use has method
```php
if ($record->has('name')) {
    echo "Name Already Set";
} else {
    echo "Name Not Set";
}
```

## Retrieve Data

Simple use get to retrive saved data. Null will be returned when key not found

```php
$name = $record->get('name');

```

### Retrive Multiple

You can retrieve more than one day at a go.

```php
[$name, $age] = $record->getMultiple(['name', 'age']);
```

#### Setting default

Sometimes, you want to get something else when data can not be found instead of null. You can set the default value.

```php
$name = $record->get('name', 'Ussd User');

[$balanceBefore, $balanceAfter] = $record->getMultiple(['balance_before', 'balance_after'], 0.00);
```

## Deleting Records

To delete single records use the delete method

```php
$record->delete('name');
```

### Delete Multiple

To delete more than one at a time, use setMultiple

```php
$record->deleteMultiple(['name', 'age']);
```