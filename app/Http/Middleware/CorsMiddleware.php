<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define los orígenes permitidos.
        // **IMPORTANTE**: Reemplaza 'http://www.tudominiowordpress.com' con el dominio exacto de tu sitio WordPress.
        // Puedes añadir múltiples dominios si es necesario: ['http://dominio1.com', 'http://dominio2.com']
        // Para desarrollo, puedes usar '*' pero NUNCA en producción por motivos de seguridad.
        $allowedOrigins = ['http://www.tudominiowordpress.com', 'https://www.tudominiowordpress.com']; // Asegúrate de incluir https si lo usas
        $origin = $request->header('Origin');

        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE', // Métodos HTTP permitidos
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization', // Cabeceras permitidas
            'Access-Control-Max-Age' => '86400', // Cachea las respuestas pre-vuelo por 24 horas
        ];

        // Solo establecemos Access-Control-Allow-Origin si el origen de la solicitud está en nuestra lista de permitidos
        if (in_array($origin, $allowedOrigins)) {
            $headers['Access-Control-Allow-Origin'] = $origin;
            // Si necesitas enviar cookies o credenciales (tokens con `withCredentials` en frontend), esto es necesario:
            $headers['Access-Control-Allow-Credentials'] = 'true';
        } else if ($origin === null || empty($origin)) { // Para solicitudes sin 'Origin' (ej. desde Postman, curl, mismo dominio)
             $headers['Access-Control-Allow-Origin'] = '*'; // Considera cómo quieres manejar esto en producción
        } else {
            // Si el origen no está permitido, puedes optar por no añadir las cabeceras CORS
            // o devolver una respuesta de error si quieres ser muy estricto.
            // Para este ejemplo, simplemente no se añadirán las cabeceras para orígenes no permitidos.
        }


        // Manejar las solicitudes OPTIONS (pre-vuelo CORS)
        if ($request->isMethod('OPTIONS')) {
            return response()->json('OK', 200, $headers);
        }

        $response = $next($request);

        // Añadir las cabeceras CORS a la respuesta final
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}