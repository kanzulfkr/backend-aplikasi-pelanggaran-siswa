<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'nip' => $this->nip,
            'jabatan' => $this->mapRole($this->roles),
            'phone' => $this->phone,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }

    protected function mapRole($role)
    {
        $roleMapping = [
            2 => 'Tata Tertib',
            3 => 'Wakasek Kesiswaan',
            4 => 'Wali Kelas',
            5 => 'Guru',
            // Add more mappings as needed
        ];

        return $roleMapping[$role] ?? 'asd';
    }
}
