# LaravelHasMeta

[![PHP Tests](https://github.com/paulhenri-l/laravel-has-meta/actions/workflows/php-tests.yml/badge.svg)](https://github.com/paulhenri-l/laravel-has-meta/actions/workflows/php-tests.yml)
[![PHP Code Style](https://github.com/paulhenri-l/laravel-has-meta/actions/workflows/php-code-style.yml/badge.svg)](https://github.com/paulhenri-l/laravel-has-meta/actions/workflows/php-code-style.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

This package make it possible to manage a json meta column using dot notation.

## Installation

```
composer require paulhenri-l/laravel-has-meta
```

## Usage

In your migrations add a `meta` column with a type of `json`

```php
Schema::create('users', function ($table) {
    $table->bigIncrements('id');
    $table->json('meta');
    $table->timestamps();
});
```

Now inside your model use the `HasMeta` trait.

```php
<?php

namespace PaulhenriL\LaravelHasMeta\Tests\Fakes;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use \PaulhenriL\LaravelHasMeta\HasMeta;
}
```

You can now use the meta API. The get and set methods use the dot notation in
order to get and set values in nested arrays.

The encrypted methods uses the `Crypt` facade and will therefore use your app's 
encryption settings.

```php
$user = new User();

// Set
$user->setMeta('preferences.time_zone', 'Europe/Paris');
$user->setEncryptedMeta('health.has_diabet', true);

// Get
$user->getMeta('preferences.time_zone');
$user->getEncryptedMeta('health.has_diabet');
```
