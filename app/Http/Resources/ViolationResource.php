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
            'violations_types_id' => $this->violations_types_id,
            'student_id' => $this->student_id,
            'officer_id' => $this->officer_id,
            'catatan' => $this->catatan,
            'is_validate' => $this->is_validate,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
