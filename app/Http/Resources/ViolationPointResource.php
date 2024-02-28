<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationPointResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_name' => $this->student_name,
            'officer_name' => $this->officer_name,
            'officer_phone' => $this->officer_phone,
            'violations_types_name' => $this->violations_types_name,
            'point' => $this->point,
            'type' => $this->type,
            'catatan' => $this->catatan,
            'is_validate' => $this->is_validate,
            'is_confirm' => $this->is_confirm,
            'created_at' => $this->created_at,
        ];
    }
}
