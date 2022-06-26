<?php

namespace App\Http\Resources\Group;

use App\Traits\DateTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    use DateTrait;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::withoutWrapping();
        $createdAt = $this->created_at ?? $this['created_at'];
        return [
            'home_team' => $this->homeTeam->name ?? ($this['homeTeam']->name ?? ''),
            'home_team_id' => $this->home_team_id ?? ($this['home_team_id'] ?? ''),
            'home_team_goal' => $this->home_team_goal ?? $this['home_team_goal'],
            'away_team_goal' => $this->away_team_goal ?? $this['away_team_goal'],
            'away_team' => $this->awayTeam->name ?? ($this['awayTeam']->name ?? ''),
            'away_team_id' => $this->away_team_id ?? ($this['away_team_id'] ?? ''),
            'week' => $this->week ?? $this['week'],
            'result' => $this->result ?? ($this['result'] ?? ''),
            'created_at' => self::formattedDate($createdAt),
        ];
    }
}
