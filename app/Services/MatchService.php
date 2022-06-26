<?php

namespace App\Services;

use App\Enumerations\MatchEnumeration;
use App\Repositories\Interfaces\IGroupRepositoryInterface;
use App\Repositories\Interfaces\ITeamRepositoryInterface;

class MatchService
{
    private $groupRepository;

    private $teamRepository;

    public function __construct(ITeamRepositoryInterface $teamRepository, IGroupRepositoryInterface $groupRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->groupRepository = $groupRepository;
    }

    /**
     * @return bool
     */
    public function playAll(): bool
    {
        foreach ($this->groupRepository->nonPlayedWeeks() as $week)
        {
            $weeklyMatchList = $this->groupRepository->weeklyGroup($week);
            $result = $this->prepareResults($weeklyMatchList);
        }

        return true;
    }

    /**
     * @param $weeklyMatches
     * @return string
     */
    public function prepareResults($weeklyMatches): string
    {
        $result = "";
        foreach ($weeklyMatches as $match) {
            $result = $this->matchResult($match);

            $scoreAndPoint = $this->generatePointAndScore($result);

            $this->groupRepository->updateGroup($match, [
                'home_team_goal' => $scoreAndPoint['home']['scored_goal'],
                'away_team_goal' => $scoreAndPoint['away']['scored_goal'],
                'result' => $result,
            ]);

            $this->teamRepository->updateTeamGroup($match->homeTeam, $scoreAndPoint['home']);
            $this->teamRepository->updateTeamGroup($match->awayTeam, $scoreAndPoint['away']);
        }
        return $result;
    }

    public function matchResult($match): string
    {
        $homeTeamCapability = $match->homeTeam->capability;
        $awayTeamCapability = $match->awayTeam->capability;

        $draw = FormulaService::calculateDrawPoint([
            $homeTeamCapability,
            $awayTeamCapability
        ]);

        $total = FormulaService::calculateTotalPoint(
            $draw,
            $homeTeamCapability,
            $awayTeamCapability
        );

        $randomNumber = rand(1, $total);

        if ($randomNumber < $homeTeamCapability) {
            return 'home';
        } else if ($randomNumber < $homeTeamCapability + $draw) {
            return 'draw';
        } else {
            return 'away';
        }
    }

    public function generatePointAndScore($result)
    {
        $maxGoal = MatchEnumeration::MAX_GOAL;
        $minGoal = MatchEnumeration::MIN_GOAL;
        $winScore = MatchEnumeration::WIN_SCORE;
        $drawScore = MatchEnumeration::DRAW_SCORE;
        $loseScore = MatchEnumeration::LOSE_SCORE;

        switch($result) {
            case 'home':
                $homeTeamGoal = rand(1, $maxGoal);
                $awayTeamGoal = rand($minGoal, ($homeTeamGoal) - 1);
                return [
                    'home' => ['scored_goal' => $homeTeamGoal, 'conceded_goal' => $awayTeamGoal, 'point' => $winScore],
                    'away' => ['scored_goal' => $awayTeamGoal, 'conceded_goal' => $homeTeamGoal, 'point' => $loseScore],
                ];
            case 'draw':
                $drawGoal = rand($minGoal, $maxGoal);
                return [
                    'home' => ['scored_goal' => $drawGoal, 'conceded_goal' => $drawGoal, 'point' => $drawScore],
                    'away' => ['scored_goal' => $drawGoal, 'conceded_goal' => $drawGoal, 'point' => $drawScore],
                ];
            case 'away':
                $awayTeamGoal = rand(1, $maxGoal);
                $homeTeamGoal = rand($minGoal, ($awayTeamGoal - 1));
                return [
                    'home' => ['scored_goal' => $homeTeamGoal, 'conceded_goal' => $awayTeamGoal, 'point' => $loseScore],
                    'away' => ['scored_goal' => $awayTeamGoal, 'conceded_goal' => $homeTeamGoal, 'point' => $winScore],
                ];
            default:
                return [];
        }
    }
}
