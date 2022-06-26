<?php

namespace App\Services;

/**
 * Class FormulaService
 * @package App\Services
 */
class FormulaService
{
    /**
     * @param $clubs
     * @return int
     */
    public static function setTotalWeek($clubs): int
    {
        return $clubs->count() - 1;
    }

    /**
     * @param $clubs
     * @return float|int
     */
    public static function setWeeklyMatchCount($clubs)
    {
        return $clubs->count() / 2;
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
     * @param $homeClubCapability
     * @param $awayClubCapability
     * @return mixed
     */
    public static function calculateTotalPoint($drawPoint,$homeClubCapability,$awayClubCapability)
    {
        return $drawPoint + $homeClubCapability + $awayClubCapability;
    }
}
