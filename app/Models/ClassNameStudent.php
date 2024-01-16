<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassNameStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'class_name_id',
        'student_id',
    ];
}
