<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $levels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        $secondLanguages = ['English', 'French', 'German', 'Italian', 'Chinese', 'Japanese', 'Portuguese', 'Arabic'];
        $cities = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Málaga', 'Bilbao', 'Zaragoza', 'Granada', 'Salamanca', 'Cádiz'];
        $centers = ['Fundación Lengua', 'Centro de Idiomas Cervantes', 'Escuela Hispánica'];

        // Valores exactos para payment_status obtenidos de tu código
        $paymentStatuses = ['501', '503', '500', '499', '485', '505', '507'];
        // Valores exactos para status obtenidos de tu código
        $statuses = ['active', 'inactive'];
        // Valores exactos para sex obtenidos de tu código
        $genders = ['Masculino', 'Femenino', 'Otro'];

        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'passport' => strtoupper(Str::random(2) . $faker->randomNumber(7, true)),
            'postal_code' => $faker->postcode(),
            'language' => 'Spanish',
            'center' => $faker->randomElement($centers),
            'level' => $faker->randomElement($levels),
            'address' => $faker->address(),
            'city' => $faker->randomElement($cities),
            'second_language' => $faker->randomElement($secondLanguages),
            'birthdate' => $faker->date('Y-m-d', '2005-01-01'),
            'partner' => (rand(0, 1) ? $faker->name() : null),
            'phone' => $faker->e164PhoneNumber(),
            'country' => 'Spain',
            'province' => $faker->state(),
            'sex' => $faker->randomElement($genders),
            'status' => $faker->randomElement($statuses),
            'payment_status' => $faker->randomElement($paymentStatuses),
            'start_date' => $faker->date('Y-m-d', 'now'),
            'end_date' => $faker->date('Y-m-d', '+1 year'),
            'user_level' => $faker->randomElement($levels),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}