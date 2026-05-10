<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Usar Bootstrap 5 para la paginación
        Paginator::useBootstrapFive();
        
        // Definir la vista de paginación predeterminada
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        
        // Definir la vista de paginación simple
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');
    }
}
