<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationTypeResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'point' => $this->point,
            'type' => $this->type,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
