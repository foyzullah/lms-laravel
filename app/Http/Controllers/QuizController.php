<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //

    public function index(){
        return view('quiz.index');
    }

    public function create(){
        return view('quiz.create');
    }


    public function store(){
        
    }

    public function show(Quiz $quiz){
        return view('quiz.show',[
            'quiz'=>$quiz
        ]);
    }

    public function edit(Quiz $quiz){
        return view('quiz.edit', [
            'quiz'=> $quiz
        ]);
    }
}
