<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'wali_kelas_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_name_students', 'class_name_id', 'student_id');
    }

    public function walikelas()
    {
        return $this->belongsTo(Teacher::class, 'wali_kelas_id');
    }
}
