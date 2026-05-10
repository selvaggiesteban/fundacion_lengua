<?php

namespace Database\Factories;

use App\Models\Scholarship;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScholarshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scholarship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $titles = [
            'Beca de Excelencia para el Español',
            'Ayuda al Estudio para Cursos Intensivos de Verano',
            'Beca de Movilidad para Estudiantes Internacionales',
            'Programa de Descuento por Nivel Avanzado',
            'Beca Cultural para el Aprendizaje del Idioma'
        ];
        $sections = ['Cursos de Español', 'Programas Especiales', 'Ayudas Económicas'];

        return [
            'title' => $faker->randomElement($titles),
            'section' => $faker->randomElement($sections),
            'summary' => $faker->sentence(10, true) . '. Con el objetivo de promover el estudio del español en España.',
            'image_path' => 'images/scholarships/default.jpg',
            'application_start_date' => $faker->dateTimeBetween('-3 months', 'now'),
            'application_end_date' => $faker->dateTimeBetween('now', '+3 months'),
            'contact_name' => $faker->name(),
            'contact_phone' => $faker->e164PhoneNumber(),
            'contact_email' => $faker->unique()->safeEmail(),
            'foundation_notes' => $faker->paragraph(2, true),
            'discount_details' => json_encode([
                'type' => $faker->randomElement(['percentage', 'fixed']),
                'value' => $faker->randomElement([10, 20, 50, 100, 200]),
                'description' => $faker->sentence(),
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}