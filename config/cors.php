<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration - DESARROLLO LOCAL
    |--------------------------------------------------------------------------
    |
    | Configuración CORS para desarrollo local con XAMPP.
    | Incluye orígenes localhost y de producción para facilitar desarrollo.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        // Orígenes de producción
        'https://fundacionpanel.esloogan.online',
        'https://www.fundacionpanel.esloogan.online',
        // Orígenes de desarrollo local
        'http://localhost',
        'http://localhost/fundacionlengua',
        'http://localhost/fundacionlengua/public',
        'http://127.0.0.1',
        'http://127.0.0.1/fundacionlengua',
        'http://127.0.0.1/fundacionlengua/public',
        // Para WordPress local (si aplica)
        'http://localhost/wordpress-fundacionlengua',
        'http://127.0.0.1/wordpress-fundacionlengua',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];