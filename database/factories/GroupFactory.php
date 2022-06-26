<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'home_team_id' => Team::factory(),
            'away_team_id' => Team::factory(),
            'week' => rand(1,6)
        ];
    }
}
