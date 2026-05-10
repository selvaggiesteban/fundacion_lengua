<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Route; // Aunque no se usa directamente en este ServiceProvider para el menú, se mantiene si tu proyecto lo requiere en otras partes.
use Illuminate\Support\ServiceProvider;
// use App\Models\User; // Descomenta esta línea si tu ServiceProvider tuviera lógica de filtrado de menú basada en roles, pero ya no la necesitamos para esta opción.
// use Illuminate\Support\Facades\Auth; // Descomenta esta línea si tu ServiceProvider tuviera lógica de filtrado de menú basada en roles, pero ya no la necesitamos para esta opción.

class MenuServiceProvider extends ServiceProvider
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
        // Las siguientes líneas fueron comentadas/eliminadas porque el menú ahora se construye
        // directamente en resources/views/layouts/sections/menu/verticalMenu.blade.php
        // y ya no necesita leer datos de un archivo JSON para su contenido o visibilidad.

        // $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        // $verticalMenuData = json_decode($verticalMenuJson);

        // $this->app->make('view')->share('menuData', [$verticalMenuData]);

        // Si este Service Provider no necesita compartir ningún otro dato global con las vistas,
        // este método 'boot' puede quedar casi vacío.
    }
}
