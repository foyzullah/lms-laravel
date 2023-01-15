<div>
    {{-- <p>{{$curriculum}}</p>
    students
    <p>{{$students}}</p> --}}
    <div class="py-4 mb-6">
        <h3 class="mb-3"><span class="font-semibold">Class Name: </span>{{$curriculum->name}}</h3>
        <h3 > <span class="font-semibold">Total Students:</span>{{count($students->students)}} </h3>
        <h3 > <span class="font-semibold">Present:</span>{{$curriculum->presentStudents()}} </h3>
        <h3 > <span class="font-semibold">Absent:</span>{{(count($students->students)-$curriculum->presentStudents())}} </h3>
    </div>



    <table class="w-full table-auto mb-6">
        <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Attendance</th>
        </tr>

        @foreach ($students->students as $student)
            
        <tr>
            <td class="border px-4 py-2">{{$student->name}}</td>
            <td class="border px-4 py-2">{{$student->email}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">

                    @if($student->isPresent($curriculum->id))
                        <h3 class="border px-3 py-2 bg-green-400 text-white rounded">Presented</h3>
                    @else
                    <button wire:click='attendance({{$student->id}})' class="py-2 px-3 border border-green-800 rounded">Present</button>
                        
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>


    <h3 class="font-bold text-lg mb-4">Notes</h3>
    @foreach($curriculum->notes as $note)
        <div class="mb-4 border border-gray-100 p-4">{{$note->description}}</div>
    @endforeach

    <h4 class="font-bold mb-2">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>
</div>
