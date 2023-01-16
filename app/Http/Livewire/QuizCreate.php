<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizCreate extends Component
{

    public $name;

    public function render()
    {
        return view('livewire.quiz-create');
    }

    public function quizSubmit(){
        Quiz::create([
            'name'=>$this->name
        ]);

        $this->name='';

        flash()->addsuccess('Quize Added');
    }
}
