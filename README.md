# Bisa
## Simple Role-Based Permissions for Laravel 5, Inspired by Laravel Router

<img src="https://travis-ci.org/imam/bisa.svg?branch=master">

### Introduction
Bisa is a simple role-based permissions for Laravel that doesn't need 
that's so simple it won't need you to modify your database at all.

### Installation

First, install through composer:

```
composer require imam/bisa
```

Second, add Bisa provider and facade to `config/app.php`:
```php
'providers' => [
    ...,
    Imam\Bisa\BisaServiceProvider::class,
],
'aliases' => [
    ...,
    'Bisa' => Imam\Bisa\BisaFacade::class,
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

### Role and Permission
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
<?php

namespace App;

use Bisa;

class Role{
    public function init(){
       Role::create('admin');
    }
}
```

To attach permission(s) to the role:
```
Role::create('admin')->permission('create-user','edit-user',...);
```

Done! 
