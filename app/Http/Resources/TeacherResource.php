<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
            'nip' => $this->nip,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }
}
