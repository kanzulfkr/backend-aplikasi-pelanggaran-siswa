<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Khs extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'subject_id',
        'student_id',
        'nilai',
        'grade',
        'keterangan',
        'tahun_akademik',
        'semester',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
