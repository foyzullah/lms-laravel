<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizIndex extends Component
{
    public function render()
    {
        $quizzes = Quiz::all();
        return view('livewire.quiz-index',[
            'quizzes'=> $quizzes
        ]);
    }


    public function deleteQuiz($id){
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        flash()->addSuccess('Quiz Deleted');
    }
}
