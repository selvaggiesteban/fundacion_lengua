<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $levels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        $testTypes = ['Gramática', 'Vocabulario', 'Comprensión Lectora', 'Expresión Oral'];

        return [
            'title' => 'Examen de Nivel de Español ' . $faker->randomElement($levels) . ' - ' . $faker->randomElement($testTypes),
            'description' => $faker->paragraph(2, true) . ' Este examen evalúa tus conocimientos del idioma español en el nivel indicado.',
            'is_active' => $faker->boolean(),
            'max_attempts' => $faker->randomElement([1, 2, 0]), // 0 para ilimitado
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}