<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Course extends Model
{
    use HasFactory;

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function students(){
        return $this->belongsToMany(User::class);
    }
}
