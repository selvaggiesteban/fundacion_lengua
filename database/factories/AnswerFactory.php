<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            // 'question_id' se establecerá cuando se use en TestSeeder
            'answer_text' => $faker->word() . ' ' . $faker->city(),
            'is_correct' => $faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}