<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $courseTitles = [
            'Curso Intensivo de Español 20h/semana',
            'Clases Particulares de Español',
            'Curso de Preparación DELE B2',
            'Curso de Español de Negocios',
            'Programa de Inmersión Cultural y Español',
            'Curso de Español para Viajeros'
        ];
        $accomodationTitles = [
            'Alojamiento en Familia Española',
            'Residencia Estudiantil Individual',
            'Apartamento Compartido Centro Ciudad',
            'Alojamiento Premium con Pensión Completa'
        ];
        $sections = ['Cursos de Idioma', 'Alojamiento', 'Actividades'];

        $section = $faker->randomElement($sections);
        $title = ($section == 'Cursos de Idioma') ? $faker->randomElement($courseTitles) : $faker->randomElement($accomodationTitles);

        $weeklyRatesDetails = [];
        for ($j = 0; $j < rand(1, 3); $j++) { // De 1 a 3 opciones de tarifas
            $weeks = $j + 1;
            $price = ($section == 'Cursos de Idioma') ? $faker->numberBetween(150, 400) * $weeks : $faker->numberBetween(100, 300) * $weeks;
            $weeklyRatesDetails[] = [
                'weeks' => $weeks,
                'price' => $price,
                'description' => ($section == 'Cursos de Idioma') ? "Precio por {$weeks} semana(s) de curso." : "Precio por {$weeks} semana(s) de alojamiento.",
            ];
        }

        return [
            'title' => $title,
            'section' => $section,
            'summary' => $faker->sentence(15, true) . ' Nuestras tarifas más competitivas para aprender español en España.',
            'start_date' => $faker->dateTimeBetween('-3 months', 'now'),
            'end_date' => $faker->dateTimeBetween('now', '+1 year'),
            'weekly_rates_details' => json_encode($weeklyRatesDetails),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}