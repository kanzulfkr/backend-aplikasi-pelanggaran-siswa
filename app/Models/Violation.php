<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'violations_types_id',
        'student_id',
        'officer_id',
        'catatan',
        'is_validate',
        'created_at' => 'datetime',
    ];


    public function violationsType()
    {
        return $this->belongsTo(ViolationsType::class, 'violations_types_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function officer()
    {
        return $this->belongsTo(Teacher::class);
    }
}
