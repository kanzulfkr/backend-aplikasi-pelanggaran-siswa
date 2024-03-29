<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'point',
        'type',
    ];
    public function violation()
    {
        return $this->belongsToMany(Violation::class);
    }
}
