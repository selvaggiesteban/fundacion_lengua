<?php

namespace Database\Factories;

use App\Models\Graduate;
use Illuminate\Database\Eloquent\Factories\Factory;

class GraduateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Graduate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            'name' => 'Promoción ' . $faker->year(),
            'description' => $faker->paragraph(2, true) . ' Celebrando los logros de nuestros estudiantes de español que concluyeron su programa de inmersión en ' . $faker->city() . ', España.',
            'event_date' => $faker->dateTimeBetween('-5 years', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}