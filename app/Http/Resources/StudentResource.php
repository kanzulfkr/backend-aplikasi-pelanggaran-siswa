<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'student_id' => $this->student_id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
            'nisn' => $this->nisn,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }
}
