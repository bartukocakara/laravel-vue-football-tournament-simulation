<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Interfaces\IGroupRepositoryInterface;
use App\Services\FormulaService;
use App\Traits\TruncateTrait;
use Illuminate\Support\Collection;

class GroupRepository implements IGroupRepositoryInterface
{
    use TruncateTrait;

    /**
     * @var group
     */
    private $group;

    /**
     * @var team
     */
    private $teams;

    /**
     * @var group
     */
    private $leagueGroup;

    /**
     * @param group $group
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return $this->group->with('homeTeam', 'awayTeam')->get();
    }

    /**
     * @return bool
     */
    public function truncate()
    {
        $this->disableForeignKeys();
        $this->group->truncate();
        $this->enableForeignKeys();
        return true;
    }

    /**
     *
     * @param $groups
     * @return mixed
     */
    public function insert($groups)
    {
        return $this->group->insert($groups);
    }

    /**
     *
     * @param $weekNumber
     * @param $teams
     * @param $group
     * @return Collection
     */
    public function setWeekGroup($weekNumber, $teams, $group)
    {
        $this->teams = $teams;
        $this->leagueGroup = $group;
        $weeklyMatchCount = FormulaService::setWeeklyMatchCount($teams);
        $weekGroup = collect();

        for ($i = 1; $i <= $weeklyMatchCount; $i++) {
            $homeTeam = $this->selectHometeam($weekGroup);
            $awayTeam = $this->selectAwayteam($weekGroup, $homeTeam);
            $weekGroup->push([
                'home_team_id' => $homeTeam->id,
                'away_team_id' => $awayTeam->id,
                'home_team_goal' => 0,
                'away_team_goal' => 0,
                'week' => $weekNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $weekGroup;
    }

    /**
     * @param $group
     * @param $weekCount
     * @return array
     */
    public function setRevenge($group, $weekCount): array
    {
        $revenge = [];
        foreach ($group as $match) {
            $revenge[] = [
                'home_team_id' => $match['away_team_id'],
                'away_team_id' => $match['home_team_id'],
                'week' => $match['week'] + $weekCount,
                'home_team_goal' => $match['home_team_goal'],
                'away_team_goal' => $match['away_team_goal'],
                'created_at' => $match['created_at'],
                'updated_at' => $match['updated_at'],
            ];
        }

        return array_merge($group, $revenge);
    }

    /**
     *
     * @return array
     */
    public function nonPlayedWeeks()
    {
        return array_unique($this->group->whereNull('result')->pluck('week')->all());
    }

    /**
     *
     * @param $week
     * @return mixed
     */
    public function weeklyGroup($week)
    {
        return $this->group->where('week', $week)->with(['homeTeam', 'awayTeam'])->get();
    }

    /**
     *
     * @param $group
     * @param $result
     * @return mixed
     */
    public function updateGroup($group, $result)
    {
        return $group->update($result);
    }

    /**
     *
     * @param $weekGroup
     * @return mixed
     */
    private function selectHomeTeam($weekGroup)
    {
        return $this->teams->whereNotIn('id', $this->activeWeekMatchteamIds($weekGroup))->random();
    }

    /**
     *
     * @param $weekGroup
     * @param $team
     * @return mixed
     */
    private function selectAwayTeam($weekGroup, $team)
    {
        return $this->teams->whereNotIn('id', $this->notAvailableteamIds($weekGroup, $team))->random();
    }

    /**
     *
     * @param $weekGroup
     * @param $team
     * @return array
     */
    private function notAvailableTeamIds($weekGroup, $team): array
    {
        return array_merge(
            [$team->id],
            $this->previousMatchteamIds($team),
            $this->activeWeekMatchteamIds($weekGroup)
        );
    }

    /**
     *
     * @param $weekGroup
     * @return array
     */
    private function activeWeekMatchTeamIds($weekGroup)
    {
        return array_merge(
            $weekGroup->pluck('away_team_id')->all(),
            $weekGroup->pluck('home_team_id')->all()
        );
    }

    /**
     *
     * @param $team
     * @return array
     */
    private function previousMatchTeamIds($team)
    {
        return array_merge(
            $this->leagueGroup->where('home_team_id', $team->id)->pluck('away_team_id')->all(),
            $this->leagueGroup->where('away_team_id', $team->id)->pluck('home_team_id')->all()
        );
    }
}
