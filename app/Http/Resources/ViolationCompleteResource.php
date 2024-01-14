<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationCompleteResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student_name' => $this->student_name,
            'officer_id' => $this->officer_id,
            'officer_name' => $this->officer_name,
            'violation_name' => $this->violation_name,
            'violations_types_id' => $this->violations_types_id,
            'point' => $this->point,
            'type' => $this->type,
            'catatan' => $this->catatan,
            'is_validate' => $this->is_validate,
            'created_at' => $this->created_at,
        ];
    }
}
