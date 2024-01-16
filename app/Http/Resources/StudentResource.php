<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'nisn' => $this->nisn,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }
}
