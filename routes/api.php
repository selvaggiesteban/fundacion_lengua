<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController; // Importa tu nuevo controlador

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta para el cálculo de precios
Route::post('/calculate-price', [QuoteController::class, 'calculatePrice']);

// Ruta para almacenar el pedido final
Route::post('/create-order', [QuoteController::class, 'storeOrder']);

// Rutas para obtener opciones dinámicas
Route::get('/course-types', [QuoteController::class, 'getCourseTypes']);
Route::get('/accommodations', [QuoteController::class, 'getAccommodations']);
Route::get('/optional-services', [QuoteController::class, 'getOptionalServices']);
Route::get('/start-dates', [QuoteController::class, 'getStartDates']);
Route::get('/weeks-options', [QuoteController::class, 'getWeeksOptions']);

// Puedes mantener esta ruta si ya la tienes para pruebas básicas
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});