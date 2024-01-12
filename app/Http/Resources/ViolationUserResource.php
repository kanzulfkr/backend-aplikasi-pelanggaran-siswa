<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationUserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_name' => $this->student_name,
            'officer_name' => $this->officer_name,
            'violation_name' => $this->violation_name,
            'point' => $this->point,
            'catatan' => $this->catatan,
            'is_validate' => $this->is_validate,
            'created_at' => $this->created_at,
        ];
    }
}
