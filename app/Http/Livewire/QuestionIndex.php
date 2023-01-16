<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionIndex extends Component
{
    public function render()
    {
        $questions = Question::all();
        return view('livewire.question-index',[
            'questions'=>$questions
        ]);
    }

    public function deleteQuestion($id){
        $question = Question::findOrFail($id);
        $question->delete();

        flash()->addSuccess('Question Deleted Successfully');


    }
}
