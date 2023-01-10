<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lead;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Admission extends Component
{
    public $search;
    public $leads=[];
    public $lead_id;
    public $selectedCourse;
    public $course_id;

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission',[
            'courses'=>$courses
        ]);
    }

    public function search(){
        $this->leads = Lead::where('name', 'like', '%' .$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search . '%')
        ->orWhere('phone', 'like', '%'. $this->search . '%')
        ->get();
    }

    public function courseSelected(){
        $this->selectedCourse = Course::findOrFail($this->course_id);
    }


    public function admit(){
        $lead = Lead::findOrFail($this->lead_id);

        $user = User::create([
            'name'=> $lead->name,
            'email'=> $lead->email,
            'password' => bcrypt('password')
        ]);

        // return redirect(route('users.index'));

        $lead->delete();
        flash()->addSuccess('Book successfully created!');
    }


}
