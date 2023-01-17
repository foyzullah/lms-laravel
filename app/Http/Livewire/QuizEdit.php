<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizEdit extends Component
{

    public $quiz;
    public $name;
    // public $questions=[];
    public $question_id;

    public function render()
    {
        // dd($this->quiz->questions->pluck('id')->toArray());
        $quiz = Quiz::findOrFail($this->quiz->id);
        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())->get();
        return view('livewire.quiz-edit',[
            'quiz'=> $quiz,
            'questions'=>$questions
        ]);
    }

    public function addQuestion(){

        $this->quiz->questions()->attach($this->question_id);
        flash()->addSuccess('Quiz Updated');
        return redirect(route('quiz.edit', $this->quiz->id));
    }
}
