<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizCreate extends Component
{

    public $name;
    public $question_id;
    public $questionSelected;
    public $questions=[];

    public function mount(){
        $this->questions = Question::all();
    }

    public function render()
    {

        return view('livewire.quiz-create');
    }

    public function quizSubmit(){
        $quiz=Quiz::create([
            'name'=>$this->name
        ]);

        $this->name='';

        flash()->addsuccess('Quize Added');
        return redirect(route('quiz.edit', $quiz->id));
    }
}
