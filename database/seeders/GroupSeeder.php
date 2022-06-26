<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
                [
                    'home_team_id' => 1,
                    'away_team_id' => 4,
                    'week' => 1,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 2,
                    'away_team_id' => 3,
                    'week' => 1,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 2,
                    'away_team_id' => 1,
                    'week' => 2,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 4,
                    'away_team_id' => 3,
                    'week' => 2,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 2,
                    'away_team_id' => 4,
                    'week' => 3,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 3,
                    'away_team_id' => 1,
                    'week' => 3,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 4,
                    'away_team_id' => 1,
                    'week' => 4,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 3,
                    'away_team_id' => 2,
                    'week' => 4,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 1,
                    'away_team_id' => 2,
                    'week' => 5,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 3,
                    'away_team_id' => 4,
                    'week' => 5,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 4,
                    'away_team_id' => 2,
                    'week' => 6,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
                [
                    'home_team_id' => 1,
                    'away_team_id' => 3,
                    'week' => 6,
                    'home_team_goal' => 0,
                    'away_team_goal' => 0,
                    'result' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-09-13 14:57:34',
                    'updated_at' => '2021-09-13 14:57:34',
                ],
            ]);
    }
}
