<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizShow extends Component
{

    public $quiz;
    public $answer;
    public $answered=[];
    public $correctAnswers=0;
    public $wrongAnswers=0;
    public function render()
    {
        return view('livewire.quiz-show',[
            'quiz'=>$this->quiz
        ]);
    }

    public function check(){
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);

        if($question->correct_answer==explode(',', $this->answer)[0]){
            flash()->addSuccess('Correct answer');
            $correct = true;
            $this->correctAnswers +=1;
        }else{
            flash()->addError('Wrong answer');
            $correct = false;
            $this->wrongAnswers+=1;
        }

        $this->answered[$question->id]=$correct;

    }
}
