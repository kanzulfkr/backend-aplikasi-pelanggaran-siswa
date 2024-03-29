<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'officer_id' => $this->officer_id,
            'violations_types_id' => $this->violations_types_id,
            'catatan' => $this->catatan,
            'is_validate' => $this->is_validate,
            'created_at' => $this->created_at,
        ];
    }
}
