<?php

namespace Tests\Feature;

use App\Enumerations\TeamEnumeration;
use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_groups()
    {
        $groups = Group::factory()->count(TeamEnumeration::MAX_TEAM)->create();
        $response = $this->get('api/groups');

        $response->assertOk();
        $groups->each(function($group) use ($response) {
            $response->assertJsonFragment(['home_team_id' => $group->home_team_id]);
        });
    }
}
