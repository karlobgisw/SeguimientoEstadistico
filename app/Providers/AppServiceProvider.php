<?php

namespace App\Providers;

// app/Providers/AppServiceProvider.php

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Compartir el usuario autenticado con todas las vistas
        View::composer('*', function ($view) {
            $view->with('usuario', auth()->user());
        });

        if (env('APP_ENV') !== 'local'){
            URL::forceScheme('https');
        }
    }
}