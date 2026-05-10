<?php

namespace Database\Factories;

use App\Models\EmailTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmailTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmailTemplate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $entityTypes = ['Student', 'Accomodation', 'Scholarship', 'Grant', 'Test', 'General'];
        $actionIdentifiers = [
            'welcome_new_student', 'scholarship_approved', 'course_start_reminder',
            'payment_due_notification', 'test_completion_summary', 'accommodation_details_sent'
        ];

        $title = $faker->sentence(rand(3, 7), true);
        $subject = $faker->sentence(rand(5, 10), true);

        return [
            'title' => ucfirst($title),
            'subject' => ucfirst($subject),
            'body' => $faker->paragraphs(3, true) . ' Saludos cordiales, ' . $faker->company() . '.',
            'entity_type' => $faker->randomElement($entityTypes),
            'action_identifier' => $faker->randomElement($actionIdentifiers),
            'description' => $faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}