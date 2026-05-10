<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rate;
use App\Models\Tag;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Leer el archivo JSON
        $jsonPath = base_path('rates.json');
        
        if (!file_exists($jsonPath)) {
            $this->command->error("El archivo rates.json no existe en la raíz del proyecto.");
            return;
        }

        $jsonContent = file_get_contents($jsonPath);
        
        // Corregir el JSON - agregar comas entre objetos
        $jsonContent = $this->fixJsonFormat($jsonContent);
        
        $ratesData = json_decode($jsonContent, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error("Error al decodificar JSON: " . json_last_error_msg());
            return;
        }

        // Limpiar tablas existentes
        Rate::query()->delete();

        $this->command->info("Procesando " . count($ratesData) . " objetos del JSON...");

        foreach ($ratesData as $index => $rateData) {
            $this->processRate($rateData, $index + 1);
        }

        $this->command->info("RateSeeder completado exitosamente.");
    }

    /**
     * Corregir formato JSON agregando comas entre objetos
     */
    private function fixJsonFormat($jsonContent)
    {
        // Agregar corchetes de array al principio y final
        $jsonContent = '[' . trim($jsonContent) . ']';
        
        // Agregar comas entre objetos }{ -> },{
        $jsonContent = preg_replace('/}\s*{/', '},{', $jsonContent);
        
        return $jsonContent;
    }

    /**
     * Procesar cada rate del JSON
     */
    private function processRate($rateData, $index)
    {
        try {
            // Mapear sección
            $section = $this->mapSection($rateData['seccion'] ?? '');
            
            // Convertir fechas
            $startDate = $this->convertDate($rateData['desde'] ?? '15/07/2025');
            $endDate = $this->convertDate($rateData['hasta'] ?? '15/07/2030');
            
            // Procesar precios o fechas
            $weeklyRatesDetails = $this->processWeeklyData($rateData);
            
            // Crear el rate
            $rate = Rate::create([
                'title' => $rateData['titulo'] ?? 'Sin título',
                'section' => $section,
                'summary' => $rateData['resumen'] ?? '',
                'start_date' => $startDate,
                'end_date' => $endDate,
                'weekly_rates_details' => $weeklyRatesDetails,
            ]);

            // Procesar etiquetas si existen
            $this->processTags($rate, $rateData['etiquetas'] ?? '');

            $this->command->info("✓ Rate #{$index}: {$rate->title} creado");

        } catch (\Exception $e) {
            $this->command->error("✗ Error procesando rate #{$index}: " . $e->getMessage());
        }
    }

    /**
     * Mapear secciones del español al inglés
     */
    private function mapSection($seccion)
    {
        $mapping = [
            'Tipo de curso' => 'course_type',
            'Alojamiento' => 'accommodation_fee',
            'Inscripción' => 'registration',
            'Opciones' => 'options',
            'Fechas' => 'date_period',
        ];

        return $mapping[$seccion] ?? Str::slug($seccion, '_');
    }

    /**
     * Convertir fecha de formato dd/mm/yyyy a yyyy-mm-dd
     */
    private function convertDate($dateString)
    {
        try {
            $date = Carbon::createFromFormat('d/m/Y', $dateString);
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            // Si falla, devolver fecha por defecto
            return '2025-07-15';
        }
    }

    /**
     * Procesar datos semanales (precios o fechas)
     */
    private function processWeeklyData($rateData)
    {
        // Si tiene campo "fechas" en lugar de "precios"
        if (isset($rateData['fechas'])) {
            return [
                'type' => 'dates',
                'dates' => $rateData['fechas']
            ];
        }

        // Si tiene precios, convertir al formato esperado por la API
        if (isset($rateData['precios'])) {
            $oddPrices = [];
            $evenPrices = [];
            
            foreach ($rateData['precios'] as $period => $price) {
                // Limpiar precio: "255 €" -> 255
                $cleanPrice = (float) preg_replace('/[^\d.,]/', '', str_replace(',', '.', $price));
                
                // Extraer número de semanas: "5 semanas impar" -> "5"
                if (preg_match('/(\d+)\s*semana[s]?\s*(impar|par)/', $period, $matches)) {
                    $weeks = $matches[1];
                    $type = $matches[2];
                    
                    if ($type === 'impar') {
                        $oddPrices[$weeks] = $cleanPrice;
                    } else {
                        $evenPrices[$weeks] = $cleanPrice;
                    }
                }
            }
            
            return [
                'odd' => $oddPrices,
                'even' => $evenPrices
            ];
        }

        return null;
    }

    /**
     * Procesar etiquetas y crear tags si es necesario
     */
    private function processTags($rate, $etiquetas)
    {
        if (empty($etiquetas)) {
            return;
        }

        // Separar etiquetas por comas si hay múltiples
        $tagNames = array_map('trim', explode(',', $etiquetas));

        foreach ($tagNames as $tagName) {
            if (!empty($tagName)) {
                // Crear o buscar tag
                $tag = Tag::firstOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );

                // Asociar tag con rate
                $rate->tags()->attach($tag->id);
            }
        }
    }
}