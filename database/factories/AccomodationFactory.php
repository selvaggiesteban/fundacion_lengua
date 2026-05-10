<?php

namespace Database\Factories;

use App\Models\Accomodation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Importar la clase Str

class AccomodationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accomodation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $sections = ['Familia Española', 'Residencia Universitaria', 'Apartamento Compartido', 'Hotel Asociado'];
        $cities = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Málaga', 'Granada', 'Salamanca', 'Cádiz'];
        $provinces = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Málaga', 'Granada', 'Salamanca', 'Cádiz',
            'Alicante', 'Bilbao', 'Zaragoza', 'Murcia', 'Córdoba', 'Valladolid'
        ];

        // Generar un CIF simulado
        $cifPrefixes = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'N', 'P', 'Q', 'R', 'S', 'U', 'V', 'W'];
        $cifPrefix = $faker->randomElement($cifPrefixes);
        $cifDigits = $faker->randomNumber(7, true);
        $controlDigit = $faker->randomLetter(); // Letra de control al final
        $taxId = $cifPrefix . $cifDigits . $controlDigit;


        return [
            'section' => $faker->randomElement($sections),
            'name' => 'Alojamiento ' . $faker->company(),
            'tax_id' => $taxId,
            'address' => $faker->address(),
            'postal_code' => $faker->postcode(),
            'city' => $faker->randomElement($cities),
            'province' => $faker->randomElement($provinces),
            'country' => 'Spain',
            'phone_1' => $faker->e164PhoneNumber(),
            'fax' => (rand(0, 1) ? $faker->e164PhoneNumber() : null),
            'website' => (rand(0, 1) ? $faker->url() : null),
            'phone_2' => (rand(0, 1) ? $faker->e164PhoneNumber() : null),
            'contact1_name' => $faker->name(),
            'contact1_position' => $faker->randomElement(['Director', 'Gerente', 'Responsable de Alojamientos']),
            'contact1_email' => $faker->unique()->safeEmail(),
            'contact2_name' => (rand(0, 1) ? $faker->name() : null),
            'contact2_position' => (rand(0, 1) ? $faker->randomElement(['Secretario', 'Asistente']) : null),
            'contact2_email' => (rand(0, 1) ? $faker->unique()->safeEmail() : null),
            'extra_info_1' => $faker->paragraph(1, true),
            'extra_info_2' => $faker->paragraph(1, true),
            'other_data' => $faker->paragraph(1, true),
            'observations' => $faker->paragraph(1, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}