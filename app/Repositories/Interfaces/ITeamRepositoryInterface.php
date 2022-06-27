<?php

namespace App\Repositories\Interfaces;

interface ITeamRepositoryInterface
{
    public function getTeams();

    public function createTeamsFromFactory();

    public function truncate();

    public function updateTeamGroup($team, $scoreAndPoint);

}
