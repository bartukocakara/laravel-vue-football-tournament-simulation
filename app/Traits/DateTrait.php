<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateTrait
{
    public static function formattedDate($date)
    {
        return !empty($date) ? Carbon::make($date)->format('Y-m-d H:i') : null;
    }
}
