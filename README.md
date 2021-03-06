# Bisa
Simple Role-Based Permissions for Laravel 5, Inspired by Laravel Router

[![Latest Stable Version](https://poser.pugx.org/imam/bisa/v/stable)](https://packagist.org/packages/imam/bisa)
[![Build Status](https://travis-ci.org/imam/bisa.svg?branch=master)](https://travis-ci.org/imam/bisa)
[![Total Downloads](https://poser.pugx.org/imam/bisa/downloads)](https://packagist.org/packages/imam/bisa)
[![License](https://poser.pugx.org/imam/bisa/license)](https://packagist.org/packages/imam/bisa)

## Introduction
Bisa is a simple role-based permissions for Laravel  that's so simple it 
won't need to modify your database at all. It's 
[Zizaco/Entrust](https://github.com/Zizaco/entrust) big fans, just simpler.

## Installation

First, install through composer:

```
composer require imam/bisa
```

Second, add Bisa service provider and facades to `config/app.php`:
```php
'providers' => [
    ...,
    Imam\Bisa\BisaServiceProvider::class,
],
'aliases' => [
    ...,
    'Bisa' => Imam\Bisa\BisaFacade::class,
    'Role' => Imam\Bisa\RoleFacade::class,
]
```

Third, publish configuration:
```
php artisan vendor:publish
```

Fourth, make sure your user model have `role` attribute (You can add to User
model a one-to-one relationship too). If you want to use other attribute to
access instead you can modify `user_role_attribute` on `bisa.php` 
configuration file.

Done! Simple right? :)

## Role and Permission
Now, you can create a new file in `App` folder named `Role.php`. We will use
this as a role and permission management file.

```
<?php

namespace App;

class Role{

    public function init(){
        
    }
    
}
```

To create a new role, it's as simple as write this in `init()` function above:
```
\Role::create('admin');
```

To attach permission(s) to the role:
```
\Role::create('admin')->permissions('create-user','edit-user',...);
```

Done! 

### Checking for roles and permissions

For now, Bisa only have one function to checking roles and permissions.
```
\Bisa::can('create-user')
```
It will retrieve the current authenticated user and check the role through
the `role` attribute on your user model. If you want to check another user
instead pass a user model to the second parameter.
```
\Bisa::can('create-user',App\User::find(1))
```

## Contact me
Imam Assidiqqi

imam@imam.tech
