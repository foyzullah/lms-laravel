<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Note;
use Livewire\Component;

class CurriculumShow extends Component
{
    public $curriculum_id;
    public $note;
    

    public function addNote() {
        $note = new Note();
        $note->description = $this->note;
        $note->curriculum_id = $this->curriculum_id;
        $note->save();

        $this->note = '';

        flash()->addSuccess('Note added successfully');
    }

    public function attendance($id){
        Attendance::create([
            'curriculum_id'=> $this->curriculum_id,
            'user_id'=>$id
        ]);

        flash()->addSuccess('Attendance Added Successfully');
    }

    public function render()
    {
        $curriculum = Curriculum::with(['course', 'notes'])->findOrFail($this->curriculum_id);
        $students = Course::with('students')->findOrFail($curriculum->course->id);
        // $notes =  ;
        // dd($students);
        return view('livewire.curriculum-show',[
            'curriculum'=> $curriculum,
            'students'=> $students
        ]);
    }
}
