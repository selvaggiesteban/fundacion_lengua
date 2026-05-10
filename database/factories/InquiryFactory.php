<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inquiry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $subjects = [
            'Información sobre cursos de español',
            'Precios y fechas de inicio',
            'Alojamiento para estudiantes',
            'Visado de estudiante',
            'Actividades culturales en España',
            'Preparación para exámenes DELE',
            'Clases particulares',
            'Cursos de verano'
        ];
        $countries = array_merge([
            'Spain', 'Mexico', 'Argentina', 'Colombia', 'Chile', 'Peru', 'Ecuador', 'Venezuela',
            'United States', 'United Kingdom', 'Germany', 'France', 'Italy', 'Brazil', 'China', 'Japan'
        ], array_fill(0, 10, 'Spain')); // Más probabilidades de ser de España

        $centers = ['Fundación Lengua', 'Centro de Idiomas Cervantes', 'Escuela Hispánica'];

        return [
            'section' => $faker->randomElement(['Cursos', 'Alojamiento', 'Visados', 'General']),
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->e164PhoneNumber(),
            'country' => $faker->randomElement($countries),
            'center' => $faker->randomElement($centers),
            'subject' => $faker->randomElement($subjects),
            'message' => $faker->paragraph(3, true) . ' Estoy muy interesado en sus cursos de español en España.',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}