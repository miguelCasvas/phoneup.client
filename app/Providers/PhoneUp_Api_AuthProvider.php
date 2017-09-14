<?php

namespace App\Providers;

use App\Http\AuthPhoneUp\PhoneUp_Api_Driver;
use Illuminate\Support\ServiceProvider;

class PhoneUp_Api_AuthProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app['auth']->extend('phoneUpApi', function(){
            return new PhoneUp_Api_Driver();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
