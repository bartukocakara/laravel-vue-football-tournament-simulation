<?php

namespace App\Repositories\Interfaces;

interface ITeamRepositoryInterface
{
    public function getTeams();

    public function createTeamsFromFactory();
}
