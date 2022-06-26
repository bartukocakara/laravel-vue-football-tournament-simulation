<?php

namespace App\Services;

use App\Http\Resources\Team\TeamResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Repositories\Interfaces\ITeamRepositoryInterface;

class TeamService
{
    /**
     * @var ITeamRepositoryInterface
     */
    private $teamRepository;

    /**
     * @param ITeamRepositoryInterface $teamRepository
     */
    public function __construct(ITeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function generateTeams(): AnonymousResourceCollection
    {
        $this->teamRepository->truncate();
        $Teams = $this->teamRepository->createTeamsFromFactory();
        return TeamResource::collection($Teams);
    }
}
