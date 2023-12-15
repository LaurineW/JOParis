<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    public static $sports = [
        'football',
        'basket-ball',
        'hand-ball',
        'tennis',
        'rugby',
        'natation',
        'lancer de poid',
        'tennis de table',
        'curling',
        'petanque',
        'judo',
        'karate',
        'jujitsue',
        'Aqua poney'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $sport = $this->faker->randomElement(self::$sports);
        $key = array_search($sport, self::$sports);
        \array_splice(self::$sports, $key, 1);

        $users_id = User::all()->pluck('id');
        return [
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'nom' => $sport,
            'user_id' => $this->faker->randomElement($users_id),
            'description' => $this->faker->paragraph,
            'annee_ajout' => $this->faker->year(),
            'nb_epreuves' => $this->faker->randomDigit(),
            'nb_disciplines' => $this->faker->randomDigit(10),
            'created_at' => new \DateTime('yesterday'),
            'updated_at' => new \DateTime('now'),
        ];
    }
}
