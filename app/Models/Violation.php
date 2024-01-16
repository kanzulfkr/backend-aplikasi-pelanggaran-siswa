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
    ];

    public function violationsType()
    {
        return $this->belongsTo(ViolationsType::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function officer()
    {
        return $this->belongsTo(User::class);
    }
}
