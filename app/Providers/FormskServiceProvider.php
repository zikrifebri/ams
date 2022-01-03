<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\departement;

class FormskServiceProvider extends ServiceProvider
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
        view()->composer('suratkeluar.form', function($view) {
            $view->with('list_departement', departement::where('id', '!=', auth()->user()->id_departement)->pluck('nama_departement','id'));
        });

        view()->composer('suratkeluar.form_pencarian', function($view) {
            $view->with('list_departement', departement::pluck('nama_departement','id'));
        });

    }
}
