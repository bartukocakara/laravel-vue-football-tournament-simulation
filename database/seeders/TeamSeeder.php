<?php

namespace Database\Seeders;

use App\Enumerations\TeamEnumeration;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory()
            ->times(TeamEnumeration::MAX_TEAM)
            ->create();
    }
}
