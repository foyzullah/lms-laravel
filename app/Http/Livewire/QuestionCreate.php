<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $options=[
        'a',
        'b',
        'c',
        'd'
    ];


    public $name;
    public $option_a;
    public $option_b;
    public $option_c;
    public $option_d;
    public $correct_answer='a';

    public function submitQuestion(){
        Question::create([
            'name'=> $this->name,
            'option_a'=> $this->option_a,
            'option_b'=> $this->option_b,
            'option_c'=> $this->option_c,
            'option_d'=> $this->option_d,
            'correct_answer'=> $this->correct_answer
        ]);

        $this->name='';
        $this->option_a='';
        $this->option_b='';
        $this->option_c='';
        $this->option_d='';
        $this->correct_answer='';

    
        flash()->addSuccess('Question Added Successfully');

        return redirect(route('question.index'));
    }
    public function render()
    {
        return view('livewire.question-create');
    }
}
