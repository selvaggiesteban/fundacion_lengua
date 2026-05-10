<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            // 'test_id' se establecerá cuando se use en TestSeeder
            'question_text' => '¿' . $faker->sentence(5, false) . ' de España?',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}