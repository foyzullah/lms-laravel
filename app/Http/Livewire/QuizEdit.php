<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizEdit extends Component
{

    public $quiz_id;
    public $name;

    public function mount(){
        $quiz = Quiz::findOrFail($this->quiz_id);

        $this->name = $quiz->name;
    }

    public function render()
    {
        $quiz = Quiz::findOrFail($this->quiz_id);
        return view('livewire.quiz-edit',[
            'quiz'=> $quiz
        ]);
    }

    public function quizUpdate(){
        $quiz = Quiz::findOrFail($this->quiz_id);

        $quiz->name = $this->name;

        $quiz->save();

        flash()->addSuccess('Quiz Updated');

        return redirect(route('quiz.index'));
    }
}
