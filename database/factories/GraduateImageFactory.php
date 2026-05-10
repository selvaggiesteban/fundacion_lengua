<?php

namespace Database\Factories;

use App\Models\GraduateImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GraduateImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GraduateImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            // 'graduate_id' se establecerá automáticamente cuando se use en GraduateSeeder
            'image_path' => 'images/graduates/' . Str::random(10) . '.jpg',
            'caption' => $faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}