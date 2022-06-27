<?php

namespace App\Services;

/**
 * Class FormulaService
 * @package App\Services
 */
class FormulaService
{
    /**
     * @param $teams
     * @return int
     */
    public static function setTotalWeek($teams): int
    {
        return $teams->count() - 1;
    }

    /**
     * @param $teams
     * @return float|int
     */
    public static function setWeeklyMatchCount($teams)
    {
        return $teams->count() / 2;
    }

    /**
     * @param $capability
     * @return float|int
     */
    public static function calculateDrawPoint($capability)
    {
        sort($capability);
        return $capability[0] * 100 / $capability[1];
    }

    /**
     * @param $drawPoint
     * @param $homeTeamCapability
     * @param $awayTeamCapability
     * @return mixed
     */
    public static function calculateTotalPoint($drawPoint,$homeTeamCapability,$awayTeamCapability)
    {
        return $drawPoint + $homeTeamCapability + $awayTeamCapability;
    }
}
