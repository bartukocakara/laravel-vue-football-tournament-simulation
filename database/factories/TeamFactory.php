<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $teamNames = [
            'Real Madrid', 'Barcelona', 'Arsenal',
            'Manchester United', 'Bayern Munich', 'Galatasaray'
        ];
        return [
            'name' => $this->faker->randomElement($teamNames).' FC',
            'scored_goal' => 0,
            'conceded_goal' => 0,
            'point' => 0,
            'capability' => rand(1, 100)
        ];
    }
}
