<?php

namespace Database\Factories;

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

        $date = $this->faker->dateTimeInInterval(
            $startDate = '+1 months',
            $interval = '+ 30 days',
        );
        return [
            'date_debut' => $date,
            'date_fin' => $this->faker->dateTimeInInterval(
                $startDate = $date,
                $interval = $date->diff(new \DateTime('now'))->format("%R%a days"),
            ),
            'nom' => $sport,
            'description' => $this->faker->paragraph,
            'annee_ajout' => $this->faker->year(),
            'nb_epreuves' => $this->faker->randomDigit(),
            'nb_disciplines' => $this->faker->randomDigit(10),
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now'),
        ];
    }
}
