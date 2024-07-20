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
            'id' => $this->faker->unique()->numberBetween(1, 100),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'image' => $this->faker->imageUrl(640, 480, 'people'),
            'domaine_expertise' => $this->faker->randomElement(['Plomberie', 'Électricité', 'Jardinage', 'Ménage']),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password
            'telephone' => $this->faker->phoneNumber,
            'region' => $this->faker->randomElement(['Île-de-France', 'Nouvelle-Aquitaine', 'Occitanie', 'Auvergne-Rhône-Alpes']),
            'disponibilite' => $this->faker->boolean,
            'model_pricing' => $this->faker->randomElement(['par heure', 'par travaille']),
            'expertise_years' => $this->faker->numberBetween(1, 20)
        ];
    }
}
