<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Team\TeamCollection;
use App\Repositories\TeamRepository;

class TeamController extends Controller
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index()
    {
        $teams = $this->teamRepository->getTeams();
        return new TeamCollection($teams);
    }
}
