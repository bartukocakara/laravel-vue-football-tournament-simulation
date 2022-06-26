<?php

namespace App\Http\Controllers\Api;


use App\Services\GroupService;
use App\Services\TeamService;

class GenerateController extends Controller
{
    private $groupService;

    private $teamService;

    public function __construct(TeamService $teamService, GroupService $groupService)
    {
        $this->teamService = $teamService;
        $this->groupService = $groupService;
    }

    public function index(): array
    {
        $teams = $this->teamService->generateTeams();
        $groups = $this->groupService->generateGroups($teams);
        return [
            'teams' => $teams,
            'groups' => $groups
        ];
    }
}
