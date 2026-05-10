<?php

namespace Database\Factories;

use App\Models\Grant;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $subjects = [
            'Solicitud de ayuda económica para estudios',
            'Apoyo para programa de inmersión cultural',
            'Financiación para curso intensivo de idiomas',
            'Beca de movilidad para estudiantes',
            'Patrocinio para eventos culturales de español'
        ];
        $countries = array_merge([
            'Spain', 'Mexico', 'Argentina', 'Colombia', 'Chile', 'Peru', 'United States', 'Germany', 'France'
        ], array_fill(0, 10, 'Spain'));

        $centers = ['Fundación Lengua', 'Centro de Idiomas Cervantes', 'Escuela Hispánica'];

        return [
            'section' => $faker->randomElement(['Ayudas', 'Financiación', 'Patrocinios']),
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->e164PhoneNumber(),
            'country' => $faker->randomElement($countries),
            'center' => $faker->randomElement($centers),
            'subject' => $faker->randomElement($subjects),
            'message' => $faker->paragraph(3, true) . ' Agradecería cualquier información sobre posibles ayudas.',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}