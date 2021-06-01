<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//ESTO LO HACEMOS PARA PODER USAR Schema::defaultStringLength
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //ESTO LO HACEMOS PARA DEFINIR LA LONGITUD DE LOS CAMPOS UNICOS EN LA BASE DE DATOS
        Schema::defaultStringLength(120);
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
