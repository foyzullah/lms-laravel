<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionEdit extends Component
{

    public $options=[
        'a',
        'b',
        'c',
        'd',
    ];

    public $question_id;
    public $name;
    public $option_a;
    public $option_b;
    public $option_c;
    public $option_d;
    public $correct_answer;

    public function mount(){
        $question = Question::findOrFail($this->question_id);

        $this->name= $question->name;
        $this->option_a= $question->option_a;
        $this->option_b= $question->option_b;
        $this->option_c= $question->option_c;
        $this->option_d= $question->option_d;
        $this->correct_answer= $question->correct_answer;

    }
    public function render()
    {
        $question = Question::findOrFail($this->question_id);
        return view('livewire.question-edit',[
            'question'=> $question
        ]);
    }

    public function submitQuestion(){
        $question = Question::findOrFail($this->question_id);

        $question->name = $this->name;
        $question->option_a= $this->option_a;
        $question->option_b= $this->option_b;
        $question->option_c= $this->option_c;
        $question->option_d= $this->option_d;
        $question->correct_answer= $this->correct_answer;

        $question->save();

        flash()->addSuccess('Quetion updated successfully');

        return redirect(route('question.index'));
    }

}
