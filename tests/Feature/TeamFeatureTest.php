<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Repositories\TeamRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $teams = (new TeamRepository(new Team()))->createTeamsFromFactory();
        $response = $this->get('api/teams');
        $response->assertOk();
        $teams->each(function($team) use ($response) {
            $response->assertJsonFragment(['name' => $team->name]);
        });
    }
}
