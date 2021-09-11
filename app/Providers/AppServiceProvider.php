<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // boris: workaround as per https://dev.mysql.com/doc/refman/5.7/en/charset-unicode-conversion.html,
                                          // https://shouts.dev/fix-specified-key-was-too-long-error-in-laravel
    }
}
