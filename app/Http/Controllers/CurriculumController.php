<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    //

    public function show($id){
        return view('course.curriculum.show',[
            'curriculum_id'=> $id
        ]);
    }
}
