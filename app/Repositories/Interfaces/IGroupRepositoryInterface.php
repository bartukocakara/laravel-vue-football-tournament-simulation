<?php

namespace App\Repositories\Interfaces;

interface IGroupRepositoryInterface
{
    public function getAll();

    public function truncate();

    public function insert($groups);

    public function setWeekGroup($weekNumber, $teams, $group);

    public function setRevenge($group, $weekCount);

    public function nonPlayedWeeks();

    public function weeklyGroup($week);

    public function updateGroup($group, $result);

}
