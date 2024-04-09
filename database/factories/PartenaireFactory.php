<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partenaire>
 */
class PartenaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'domaine_expertise' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'telephone' => $this->faker->phoneNumber,
            'region' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'disponibilite' => $this->faker->boolean,
            'tarif' => $this->faker->numberBetween(100, 1000),
            'model_pricing' => $this->faker->randomElement(['hourly', 'fixed']),
        ];
    }
}
