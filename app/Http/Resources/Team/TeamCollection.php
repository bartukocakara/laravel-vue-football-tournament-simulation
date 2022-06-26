<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;

class TeamCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'total' => $this->resource->count(),
            'data' => $this->resource
        ];
    }
}
