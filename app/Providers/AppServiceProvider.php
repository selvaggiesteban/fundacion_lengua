<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
    }

    public function boot(): void
    {
        // Usar Bootstrap 5 para la paginación
        Paginator::useBootstrapFive();
        
        // Definir la vista de paginación predeterminada
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        
        // Definir la vista de paginación simple
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');

        // Establecer el idioma de Carbon a español
        Carbon::setLocale('es');
    }
}
