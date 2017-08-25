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
IZETTLE_USERNAME=
IZETTLE_PASSWORD=
IZETTLE_REDIRECT=
```

### Password Grant
Using the password grant method for private integrations with IZettle be sure to also fill out the ``IZETTLE_USERNAME`` and ``IZETTLE_PASSWORD`` fields in .env file.
``IZETTLE_REDIRECT`` isn't used for password grant.

To use it with password grant just use the following method as it only requires a single interaction with the api. Remember to use ``Stateless`` as the api doesn't use a ``state`` for this interaction.
```php
    /**
     * Gets the users AccessToken and Refreshtoken from the api.
     *
     *
     */
    public function AuthIzettle()
    {
        $user = Socialite::driver('izettle')->stateless()->user();
        //dd($user);
    }
```


#### Laravel <= 5.4
Add the following to your config/app.php
```
crowdedlight\Socialite\IZettle\IZettleServiceProvider::class,
```

#### Laravel 5.5
Service Provider is auto discovered.

## Usage

```php
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
$user->organization;
```