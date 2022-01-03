<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class kkpAppServiceProvider extends ServiceProvider
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
        $halaman ='';
        
    if (Request::segment(1) == '/'){
        $halaman = 'beranda';
     }
    if (Request::segment(1) == 'surat-masuk'){
        $halaman = 'suratmasuk';
    }
    if (Request::segment(1) == 'admin') {
        $halaman = 'admin';
    }
    if (Request::segment(1) == 'surat-keluar') {
        $halaman = 'suratkeluar';
    }
    if (Request::segment(1) == 'chat') {
        $halaman = 'chat';
    }
    if (request()->segment(1) == 'departement') {
        $halaman = 'departement';
    }
    if (request()->segment(1) == 'user') {
        $halaman = 'user';
    }
    view()->share('halaman', $halaman);

   
    }
}
