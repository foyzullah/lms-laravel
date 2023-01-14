<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays=[];
    public $time;
    public $end_date;

    protected $rules =[
        'name'=> 'required|unique:courses,name',
        'description'=> 'required',
        'price'=>'required'
    ];

    public $days=[
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    public function formSubmit(){
        $this->validate();

        $course = Course::create([
            'name'=> $this->name,
            'description'=> $this->description,
            'price'=>$this->price,
            'user_id'=> auth()->user()->id
        ]);

        $course->save();

        // dd($this->time, $this->end_date, $this->selectedDays);

        $start_date = new DateTime(now());
        $end_date =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);

        $classNum=0;

        foreach($this->selectedDays as $slelectedDay){
            foreach($date_range as $date){
                if($date->format('l')==$slelectedDay){
                    $classNum++;

                    $class = Curriculum::create([
                        'name'=>$this->name,
                        'course_id'=> $course->id
                    ]);

                    $class->save();


                }
            }
        }




        flash()->addSuccess('Course created successfully');
        return redirect()->route('course.index');


        
    }


    public function render()
    {
        return view('livewire.course-create');
    }
}
