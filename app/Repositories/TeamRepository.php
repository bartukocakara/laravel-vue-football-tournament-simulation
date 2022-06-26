<?php

namespace App\Repositories;

use App\Enumerations\TeamEnumeration;
use App\Models\Team;
use App\Repositories\Interfaces\ITeamRepositoryInterface;
use App\Traits\TruncateTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TeamRepository implements ITeamRepositoryInterface
{
    use TruncateTrait;

    private $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function getTeams()
    {
        return $this->team->orderByDesc('capability')->get();
    }

    /**
     * @return Collection|Model
     */
    public function createTeamsFromFactory()
    {
        return $this->team->factory()->count(TeamEnumeration::MAX_TEAM)->create();
    }

    /**
     * @return bool
     */
    public function truncate()
    {
        $this->disableForeignKeys();
        $this->team->truncate();
        $this->enableForeignKeys();
        return true;
    }

    /**
     * @param $team
     * @param $goals
     * @param $point
     * @return void
     */
    public function updateTeamGroup($team, $scoreAndPoint)
    {
        $team->update([
            'scored_goal' => $team->scored_goal + $scoreAndPoint['scored_goal'],
            'conceded_goal' => $team->conceded_goal + $scoreAndPoint['conceded_goal'],
            'point' => $team->point + $scoreAndPoint['point'],
        ]);
    }
}
