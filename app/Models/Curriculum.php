<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'course_id'
    ];

    public function homeworks()
    {
        return $this->hasMany(HomeWork::class);
    }

    public function attendences()
    {
        return $this->hasMany(Attendance::class);
    }
}
