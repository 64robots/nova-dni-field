<?php

namespace R64\NovaDniField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-dni-field', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-dni-field', __DIR__.'/../dist/css/field.css');
        });

        Validator::extend('dni', function ($attribute, $value, $parameters, $validator) {
            if (!$value) {
                return true;
            }
            return ValidateDni::check_dni($value);
        }, 'Invalid Dni');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
