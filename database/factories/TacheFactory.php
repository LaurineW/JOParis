<?php

namespace Database\Factories;

use App\Models\Tache;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tache>
 */
class TacheFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
        );
        return [
            'expiration' => $this->faker->dateTimeInInterval(
                $startDate = $createAt,
                $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            ),
            'categorie' => $this->faker->randomElement($array = array('Urgent', 'A Faire', 'Optionnel')),
            'description' => $this->faker->paragraph,
            'effectuee' => $this->faker->randomElement($array = array(true, false)),
            'created_at' => $createAt,
            'updated_at' => $this->faker->dateTimeInInterval(
                $startDate,
                $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            ),
        ];

    }

}
