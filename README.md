# IZettle Provider for Laravel Socialite

## Installation and config
Install Larvel Socialite (see here: https://github.com/laravel/socialite/blob/2.0/readme.md)

Install the IZettle socialite provider

```
composer require crowdedlight/izettle-socialite
```

Add the follwing to your .env file:

```
IZETTLE_CLIENT_ID=
IZETTLE_CLIENT_SECRET=
IZETTLE_REDIRECT=
```

#### Laravel <= 5.4
Add the following to your config/app.php
```
crowdedlight\Socialite\IZettle\IZettleServiceProvider::class,
```

#### Laravel 5.5
Service Provider is auto discovered.

## Usage

```
<?php

namespace App\Http\Controllers\Auth;

use Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the IZettle authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('izettle')->redirect();
    }

    /**
     * Obtain the user information from IZettle.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('izettle')->user();

        //dd($user);
    }
}
```

## Retrieving User Details

Once you have a user instance, you can grab a few more details about the user:

```php
$user = Socialite::driver('izettle')->user();

$token = $user->token;
$expiresIn = $user->expiresIn;
$user->getId();
$user->getOrganization();
```