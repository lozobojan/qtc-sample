<?php

namespace Database\Factories;

use App\Enums\ClientType;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isCompany = rand(0,1);
        return [
            'company_name' => $this->faker->company,
            'company_email' => $this->faker->unique()->safeEmail,
            'date_of_birth' => !$isCompany ? $this->faker->date : null,
            'registration_number' => $isCompany ? Str::uuid() : null,
            'contact_name' => $this->faker->name,
            'contact_email' => $this->faker->unique()->safeEmail,
            'type_of_client' => !$isCompany ? ClientType::PERSON : ClientType::COMPANY
        ];
    }
}
