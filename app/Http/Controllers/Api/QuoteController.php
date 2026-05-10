<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rate; // Importa el modelo Rate
use App\Models\Scholarship; // Importa el modelo Scholarship
use App\Models\Order; // Importa el modelo Order
use Exception; // Importa la clase Exception

class QuoteController extends Controller
{
    /**
     * Calcula el precio total basado en las selecciones del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculatePrice(Request $request)
    {
        // 1. Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            'course_type' => 'required|string',
            'accommodation' => 'nullable|string',
            'weeks' => 'required|integer|min:1',
            'start_date' => 'required|string',
            'insurance' => 'boolean',
            'transport' => 'boolean',
            'parking_available' => 'boolean',
            'cancellation_policy' => 'boolean',
            'university_certificate_ects' => 'boolean',
            'destination' => 'required|string',
            'discount_code' => 'nullable|string',
        ]);
        
        // Validación adicional para formato de fecha dd/mm/yyyy
        $validator->after(function ($validator) use ($request) {
            $startDate = $request->input('start_date');
            if ($startDate && !$this->isValidDateFormat($startDate)) {
                $validator->errors()->add('start_date', 'La fecha debe tener el formato dd/mm/yyyy');
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422); // Código 422 para errores de validación
        }

        $data = $validator->validated();
        $total = 0;
        $details = [];

        try {
            // 2. Obtener precios de Rates
            // TIPO DE CURSO
            $courseRate = Rate::where('section', 'course_type')
                              ->where('title', $data['course_type'])
                              ->first();

            if (!$courseRate) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tipo de curso no encontrado.',
                    'details' => $data['course_type']
                ], 404);
            }

            // Obtener el precio total según las semanas desde weekly_rates_details
            $weeklyRatesDetails = $courseRate->weekly_rates_details;
            $weeks = (string) $data['weeks']; // Convertir a string para la búsqueda
            
            // Decodificar JSON si está en formato string
            if (is_string($weeklyRatesDetails)) {
                $weeklyRatesDetails = json_decode($weeklyRatesDetails, true);
            }
            
            // Buscar en 'odd' o 'even' según la cantidad de semanas
            $courseTotal = null;
            if (is_array($weeklyRatesDetails)) {
                if (isset($weeklyRatesDetails['odd'][$weeks])) {
                    $courseTotal = (float) $weeklyRatesDetails['odd'][$weeks];
                } elseif (isset($weeklyRatesDetails['even'][$weeks])) {
                    $courseTotal = (float) $weeklyRatesDetails['even'][$weeks];
                }
            }
            
            if ($courseTotal === null) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Precio para {$weeks} semanas no definido para este curso. Verifique que la tarifa tenga configurado el precio para esta cantidad de semanas (1-40).",
                ], 500);
            }
            
            $coursePricePerWeek = $courseTotal / $weeks;
            $total += $courseTotal;
            $details['course'] = [
                'name' => $courseRate->title,
                'price_per_week' => $coursePricePerWeek,
                'weeks' => $data['weeks'],
                'total' => $courseTotal
            ];

            // ALOJAMIENTO (si está seleccionado)
            if (!empty($data['accommodation']) && $data['accommodation'] !== 'Sin alojamiento') {
                $accommodationRate = Rate::where('section', 'accommodation_fee')
                                         ->where('title', $data['accommodation'])
                                         ->first();
                if (!$accommodationRate) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Alojamiento no encontrado.',
                        'details' => $data['accommodation']
                    ], 404);
                }
                // Obtener el precio total del alojamiento según las semanas
                $accommodationWeeklyRates = $accommodationRate->weekly_rates_details;
                
                // Decodificar JSON si está en formato string
                if (is_string($accommodationWeeklyRates)) {
                    $accommodationWeeklyRates = json_decode($accommodationWeeklyRates, true);
                }
                
                $accommodationTotal = null;
                if (is_array($accommodationWeeklyRates)) {
                    if (isset($accommodationWeeklyRates['odd'][$weeks])) {
                        $accommodationTotal = (float) $accommodationWeeklyRates['odd'][$weeks];
                    } elseif (isset($accommodationWeeklyRates['even'][$weeks])) {
                        $accommodationTotal = (float) $accommodationWeeklyRates['even'][$weeks];
                    }
                }
                
                if ($accommodationTotal === null) {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Precio de alojamiento para {$weeks} semanas no definido.",
                    ], 500);
                }
                
                $accommodationPricePerWeek = $accommodationTotal / $weeks;
                $total += $accommodationTotal;
                $details['accommodation'] = [
                    'name' => $accommodationRate->title,
                    'price_per_week' => $accommodationPricePerWeek,
                    'weeks' => $data['weeks'],
                    'total' => $accommodationTotal
                ];
            } else {
                $details['accommodation'] = [
                    'name' => 'Sin alojamiento',
                    'total' => 0
                ];
            }


            // OPCIONES ADICIONALES (booleanos)
            $optionalRates = Rate::where('section', 'options')->get();
            $optionalMapping = [
                'insurance' => 'Seguro',
                'transport' => 'Transporte',
                'parking_available' => 'Parking (Bajo disponibilidad)',
                'cancellation_policy' => 'Cancelación',
                'university_certificate_ects' => 'Certificado Universitario + ECTs'
            ];
            
            foreach ($optionalMapping as $option => $optionTitle) {
                if (isset($data[$option]) && $data[$option]) {
                    $rate = $optionalRates->firstWhere('title', $optionTitle);
                    if ($rate) {
                        $rateDetails = $rate->weekly_rates_details;
                        
                        // Decodificar JSON si está en formato string
                        if (is_string($rateDetails)) {
                            $rateDetails = json_decode($rateDetails, true);
                        }
                        
                        $price = 0;
                        if (is_array($rateDetails)) {
                            if (isset($rateDetails['odd']['1'])) {
                                $price = (float) $rateDetails['odd']['1'];
                            } elseif (isset($rateDetails['even']['1'])) {
                                $price = (float) $rateDetails['even']['1'];
                            }
                        }
                        
                        $total += $price;
                        $details[$option] = [
                            'name' => $rate->title,
                            'price' => $price
                        ];
                    }
                }
            }
            
            // INSCRIPCIÓN (tarifa fija de registro, si existe)
            $registrationRate = Rate::where('section', 'registration')->first();
            if ($registrationRate) {
                $weeklyRatesDetails = $registrationRate->weekly_rates_details;
                $registrationFee = 0;
                
                // Obtener el precio para 1 semana (tarifa fija)
                if (is_array($weeklyRatesDetails)) {
                    if (isset($weeklyRatesDetails['odd']['1'])) {
                        $registrationFee = (float) $weeklyRatesDetails['odd']['1'];
                    } elseif (isset($weeklyRatesDetails['even']['1'])) {
                        $registrationFee = (float) $weeklyRatesDetails['even']['1'];
                    }
                }
                
                $total += $registrationFee;
                $details['registration_fee'] = [
                    'name' => $registrationRate->title,
                    'price' => $registrationFee
                ];
            }

            // 3. Aplicar código de descuento (Scholarship)
            $discountApplied = 0;
            if (!empty($data['discount_code'])) {
                // Buscar en scholarships
                $scholarship = Scholarship::where('discount_code', $data['discount_code'])
                                          ->where('application_start_date', '<=', now())
                                          ->where('application_end_date', '>=', now())
                                          ->first();

                if ($scholarship) {
                    $discountPercentage = $scholarship->discount_details['percentage'] ?? 0;
                    if ($discountPercentage > 0) {
                        $discountApplied = $total * ($discountPercentage / 100);
                        $total -= $discountApplied;
                        $details['discount'] = [
                            'code' => $scholarship->discount_code,
                            'type' => 'scholarship',
                            'percentage' => $discountPercentage,
                            'amount_deducted' => $discountApplied
                        ];
                    }
                } else {
                    $details['discount_message'] = 'Código de descuento no válido o expirado.';
                }
            }


            // 4. Devolver la respuesta calculada
            $responseData = [
                'status' => 'ok',
                'detalle' => $details,
                'total' => round($total, 2) // Redondear el total a 2 decimales
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error interno al calcular el precio.',
                'exception' => $e->getMessage() // Solo para depuración, quitar en producción
            ], 500);
        }
    }

    /**
     * Almacena un nuevo pedido en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeOrder(Request $request)
    {
        // 1. Validación de todos los datos de entrada
        $validator = Validator::make($request->all(), [
            // Campos de la selección inicial (de la calculadora) - estos se guardarán en order_details JSON
            'course_type' => 'required|string',
            'accommodation' => 'nullable|string',
            'weeks' => 'required|integer|min:1',
            'start_date' => 'required|string',
            'insurance' => 'boolean',
            'transport' => 'boolean',
            'parking_available' => 'boolean',
            'cancellation_policy' => 'boolean',
            'university_certificate_ects' => 'boolean',
            'destination' => 'required|string',
            'discount_code' => 'nullable|string',
            'total_calculated' => 'required|numeric|min:0', // El total ya calculado desde la primera llamada

            // Campos de datos personales del estudiante (coinciden con las columnas de Orders)
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', // Permitir múltiples inscripciones del mismo email
            'phone_number' => 'nullable|string|max:50',
            'passport_number' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:100', // Idioma principal
            'second_language' => 'nullable|string|max:100', // Segundo idioma
            'spanish_level' => 'nullable|string|max:50',
            'study_center_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|string',
            'gender' => 'nullable|string|max:20',
            'smoking_preference' => 'boolean',
            'pets_preference' => 'boolean',
            'notes' => 'nullable|string',
        ]);

        // Validación adicional para formato de fecha dd/mm/yyyy
        $validator->after(function ($validator) use ($request) {
            $startDate = $request->input('start_date');
            if ($startDate && !$this->isValidDateFormat($startDate)) {
                $validator->errors()->add('start_date', 'La fecha de inicio debe tener el formato dd/mm/yyyy');
            }
            
            $birthDate = $request->input('birth_date');
            if ($birthDate && !$this->isValidDateFormat($birthDate)) {
                $validator->errors()->add('birth_date', 'La fecha de nacimiento debe tener el formato dd/mm/yyyy o yyyy-mm-dd');
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación en los datos de inscripción',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        try {
            // 2. Preparar los datos para el pedido
            $orderDetails = [
                'course_type' => $data['course_type'],
                'accommodation' => $data['accommodation'] ?? null,
                'weeks' => $data['weeks'],
                'start_date' => $this->convertDateToMysqlFormat($data['start_date']),
                'insurance' => $data['insurance'] ?? false,
                'transport' => $data['transport'] ?? false,
                'parking_available' => $data['parking_available'] ?? false,
                'cancellation_policy' => $data['cancellation_policy'] ?? false,
                'university_certificate_ects' => $data['university_certificate_ects'] ?? false,
                'destination' => $data['destination'],
                'discount_code' => $data['discount_code'] ?? null,
                'total_calculated' => $data['total_calculated'],
            ];

            // Generar un número de pedido único (puedes ajustar la lógica)
            $orderNumber = 'ORD-' . time() . '-' . uniqid();

            // Crear el nuevo pedido
            $order = Order::create([
                // Campos de pedido base
                'user_id' => null, // No se asocia usuario de Laravel al inicio
                'order_number' => $orderNumber,
                'order_date' => now(), // Fecha y hora actual del pedido
                'total_amount' => $data['total_calculated'],
                'status' => Order::STATUS_PENDING, // Estado inicial 'pendiente'
                'payment_method' => null, // Esto se podría actualizar después de un pago
                'description' => 'Inscripción a curso de idiomas',
                'review_status' => 'pending', // Nuevo campo para el estado de revisión

                // Campos de la selección de curso (los mismos que en order_details pero para columnas directas)
                'course_type' => $data['course_type'],
                'accommodation' => $data['accommodation'] ?? null,
                'weeks' => $data['weeks'],
                'start_date' => $this->convertDateToMysqlFormat($data['start_date']),
                'insurance' => $data['insurance'] ?? false,
                'transport' => $data['transport'] ?? false,
                'parking_available' => $data['parking_available'] ?? false,
                'cancellation_policy' => $data['cancellation_policy'] ?? false,
                'university_certificate_ects' => $data['university_certificate_ects'] ?? false,
                'destination' => $data['destination'],
                'discount_code' => $data['discount_code'] ?? null,

                // Campos de datos personales del estudiante
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'] ?? null,
                'passport_number' => $data['passport_number'] ?? null,
                'address' => $data['address'] ?? null,
                'country' => $data['country'] ?? null,
                'postal_code' => $data['postal_code'] ?? null,
                'city' => $data['city'] ?? null,
                'province' => $data['province'] ?? null,
                'language' => $data['language'] ?? null,
                'second_language' => $data['second_language'] ?? null,
                'spanish_level' => $data['spanish_level'] ?? null,
                'study_center_name' => $data['study_center_name'] ?? null,
                'birth_date' => isset($data['birth_date']) && $data['birth_date'] ? $this->convertDateToMysqlFormat($data['birth_date']) : null,
                'gender' => $data['gender'] ?? null,
                'smoking_preference' => $data['smoking_preference'] ?? false,
                'pets_preference' => $data['pets_preference'] ?? false,
                'notes' => $data['notes'] ?? null,

                // Guardar los detalles completos de la selección en el campo JSON
                'order_details' => $orderDetails,
            ]);

            // 3. Devolver una respuesta exitosa con URL de pago
            $paymentUrl = route('payment.initiate', ['order' => $order->id]);
            
            return response()->json([
                'status' => 'ok',
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'payment_url' => $paymentUrl,
                'message' => 'Pedido registrado correctamente. Redirigiendo al pago...'
            ], 201); // Código 201 para "Created"

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error interno al registrar el pedido.',
                'exception' => $e->getMessage() // Solo para depuración, quitar en producción
            ], 500);
        }
    }

    /**
     * Obtiene las opciones de tipos de curso desde la entidad rates
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourseTypes()
    {
        try {
            $courseTypes = Rate::where('section', 'course_type')
                              ->select('title', 'summary', 'weekly_rates_details')
                              ->get()
                              ->map(function ($rate) {
                                  // Obtener precio de 1 semana como referencia
                                  $weeklyRates = $rate->weekly_rates_details;
                                  
                                  // Decodificar JSON si está en formato string
                                  if (is_string($weeklyRates)) {
                                      $weeklyRates = json_decode($weeklyRates, true);
                                  }
                                  
                                  $priceOneWeek = 0;
                                  if (is_array($weeklyRates)) {
                                      if (isset($weeklyRates['odd']['1'])) {
                                          $priceOneWeek = (float) $weeklyRates['odd']['1'];
                                      } elseif (isset($weeklyRates['even']['1'])) {
                                          $priceOneWeek = (float) $weeklyRates['even']['1'];
                                      }
                                  }
                                  
                                  return [
                                      'title' => $rate->title,
                                      'summary' => $rate->summary,
                                      'price_per_week' => $priceOneWeek,
                                      'weekly_rates' => $rate->weekly_rates_details
                                  ];
                              });

            $responseData = [
                'status' => 'ok',
                'data' => $courseTypes
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener tipos de curso',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene las opciones de alojamiento desde la entidad rates
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAccommodations()
    {
        try {
            $accommodations = Rate::where('section', 'accommodation_fee')
                                 ->select('title', 'summary', 'weekly_rates_details')
                                 ->get()
                                 ->map(function ($rate) {
                                     // Obtener precio de 1 semana como referencia
                                     $weeklyRates = $rate->weekly_rates_details;
                                     
                                     // Decodificar JSON si está en formato string
                                     if (is_string($weeklyRates)) {
                                         $weeklyRates = json_decode($weeklyRates, true);
                                     }
                                     
                                     $priceOneWeek = 0;
                                     if (is_array($weeklyRates)) {
                                         if (isset($weeklyRates['odd']['1'])) {
                                             $priceOneWeek = (float) $weeklyRates['odd']['1'];
                                         } elseif (isset($weeklyRates['even']['1'])) {
                                             $priceOneWeek = (float) $weeklyRates['even']['1'];
                                         }
                                     }
                                     
                                     return [
                                         'title' => $rate->title,
                                         'summary' => $rate->summary,
                                         'price_per_week' => $priceOneWeek,
                                         'weekly_rates' => $rate->weekly_rates_details
                                     ];
                                 });

            $responseData = [
                'status' => 'ok',
                'data' => $accommodations
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener opciones de alojamiento',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene las opciones adicionales desde la entidad rates
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOptionalServices()
    {
        try {
            $optionalServices = Rate::where('section', 'options')
                                   ->select('title', 'summary', 'weekly_rates_details')
                                   ->get()
                                   ->map(function ($rate) {
                                       $weeklyRates = $rate->weekly_rates_details;
                                       
                                       // Decodificar JSON si está en formato string
                                       if (is_string($weeklyRates)) {
                                           $weeklyRates = json_decode($weeklyRates, true);
                                       }
                                       
                                       $price = 0;
                                       if (is_array($weeklyRates)) {
                                           if (isset($weeklyRates['odd']['1'])) {
                                               $price = (float) $weeklyRates['odd']['1'];
                                           } elseif (isset($weeklyRates['even']['1'])) {
                                               $price = (float) $weeklyRates['even']['1'];
                                           }
                                       }
                                       
                                       return [
                                           'title' => $rate->title,
                                           'summary' => $rate->summary,
                                           'price' => $price
                                       ];
                                   });

            $responseData = [
                'status' => 'ok',
                'data' => $optionalServices
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener servicios opcionales',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene las fechas de inicio desde la entidad rates (sección "Fechas abiertas")
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStartDates()
    {
        try {
            $openDatesRate = Rate::where('section', 'date_period')
                                ->where('title', 'Fechas abiertas')
                                ->first();

            if (!$openDatesRate) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se encontraron fechas abiertas configuradas'
                ], 404);
            }

            // Obtener fechas desde weekly_rates_details
            $weeklyRatesDetails = $openDatesRate->weekly_rates_details;
            $dates = [];
            
            if (is_array($weeklyRatesDetails) && isset($weeklyRatesDetails['dates'])) {
                $dates = $weeklyRatesDetails['dates'];
            }
            
            // Filtrar fechas futuras y formatearlas para mejor legibilidad
            $currentDate = now();
            $futureDates = [];
            
            foreach ($dates as $date) {
                try {
                    $dateObj = \Carbon\Carbon::createFromFormat('d/m/Y', $date);
                    if ($dateObj->gte($currentDate)) {
                        $futureDates[] = $dateObj->format('d/m/Y');
                    }
                } catch (\Exception $e) {
                    // Si falla el parsing, incluir la fecha original
                    $futureDates[] = $date;
                }
            }

            $responseData = [
                'status' => 'ok',
                'data' => $futureDates
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener fechas de inicio',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene las opciones de semanas (1 a 40)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeeksOptions()
    {
        try {
            $weeks = [];
            for ($i = 1; $i <= 40; $i++) {
                $weeks[] = [
                    'value' => $i,
                    'label' => $i . ($i == 1 ? ' semana' : ' semanas')
                ];
            }

            $responseData = [
                'status' => 'ok',
                'data' => $weeks
            ];
            
            return response(json_encode($responseData, JSON_UNESCAPED_UNICODE), 200)
                ->header('Content-Type', 'application/json; charset=utf-8');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener opciones de semanas',
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Valida si una fecha tiene el formato dd/mm/yyyy o yyyy-mm-dd
     *
     * @param string $date
     * @return bool
     */
    private function isValidDateFormat($date)
    {
        if (empty($date)) {
            return true; // Campos vacíos son válidos para campos opcionales
        }
        
        try {
            // Intentar formato dd/mm/yyyy
            $dateObj = \Carbon\Carbon::createFromFormat('d/m/Y', $date);
            if ($dateObj && $dateObj->format('d/m/Y') === $date) {
                return true;
            }
        } catch (\Exception $e) {
            // Ignorar error y probar siguiente formato
        }
        
        try {
            // Intentar formato yyyy-mm-dd (ISO/HTML5 date input)
            $dateObj = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
            if ($dateObj && $dateObj->format('Y-m-d') === $date) {
                return true;
            }
        } catch (\Exception $e) {
            // Ignorar error
        }
        
        return false;
    }

    /**
     * Convierte una fecha del formato dd/mm/yyyy o yyyy-mm-dd a yyyy-mm-dd para MySQL
     *
     * @param string $date
     * @return string
     */
    private function convertDateToMysqlFormat($date)
    {
        if (empty($date)) {
            return null;
        }
        
        try {
            // Intentar formato dd/mm/yyyy
            $dateObj = \Carbon\Carbon::createFromFormat('d/m/Y', $date);
            if ($dateObj && $dateObj->format('d/m/Y') === $date) {
                return $dateObj->format('Y-m-d');
            }
        } catch (\Exception $e) {
            // Ignorar error y probar siguiente formato
        }
        
        try {
            // Intentar formato yyyy-mm-dd (ya está en formato MySQL)
            $dateObj = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
            if ($dateObj && $dateObj->format('Y-m-d') === $date) {
                return $date; // Ya está en el formato correcto
            }
        } catch (\Exception $e) {
            // Ignorar error
        }
        
        return $date; // Si no coincide ningún formato, devolver original
    }
}