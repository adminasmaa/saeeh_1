<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Schema::defaultStringLength(191);

        Model::preventLazyLoading(! $this->app->isProduction());
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^([0-9\s\-\+\(\)]*)$/', $value);
        });
    }
}
