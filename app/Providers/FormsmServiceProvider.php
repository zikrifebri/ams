<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\departement;

class FormsmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('form', function($view) {
            $view->with('list_departement', departement::pluck('nama_departement','id'));
        });

        view()->composer('form_pencarian', function($view) {
            $view->with('list_departement', departement::pluck('nama_departement','id'));
        });
    }
}
