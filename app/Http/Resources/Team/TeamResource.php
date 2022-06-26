<?php

namespace App\Http\Resources\Team;

use App\Helpers\DateHelper;
use App\Traits\DateTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;

class TeamResource extends JsonResource
{
    use DateTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::withoutWrapping();

        return array(
            'name' => $this->name,
            'scored_goal' => $this->scored_goal,
            'conceded_goal' => $this->conceded_goal,
            'point' => $this->point,
            'capability' => $this->capability,
            'created_at' => self::formattedDate($this->created_at),

        );
    }
}
