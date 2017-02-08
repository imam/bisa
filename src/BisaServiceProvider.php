<?php

namespace Imam\Bisa;

use Illuminate\Support\ServiceProvider;

class BisaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bisa.php' => config_path('bisa.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bisa',function ($app){
            return new Bisa();
        });
        $this->app->bind('bisa_role',function ($app){
            return new Role();
        });
        $this->app->bind('bisa_permission',function ($app){
            return new PermissionModel();
        });

    }
}