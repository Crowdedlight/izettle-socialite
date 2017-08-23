<?php

namespace crowdedlight\Socialite\IZettle;

use Illuminate\Support\ServiceProvider;

class IZettleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'izettle',
            function ($app) use ($socialite) {
                $config = $app['config']['services.izettle'];
                return $socialite->buildProvider(Provider::class, $config);
            }
        );
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/services.php', 'services'
        );
    }
}