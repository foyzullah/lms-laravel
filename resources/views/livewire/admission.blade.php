<div>
    <form wire:submit.prevent='search' class="flex items-center mb-4">
        <input wire:model.lazy='search' type="text" class="lms-input" placeholder="Search">
        <button class="lms-btn ml-3">Search</button>
    </form>

    <form wire:submit.prevent="admit">

        @if (!empty($leads))     
        <div class="mb-4">
            <p>Found:{{count($leads)}}</p>
            <select wire:model.lazy="lead_id" class="lms-input">
                <option value="">Select Lead</option>
                @foreach ($leads as $lead)
                <option value="{{$lead->id}}">{{$lead->name}} - {{$lead->phone}}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (!empty($lead_id))
        <div class="mb-4">
            <select wire:change.lazy='courseSelected' wire:model.lazy="course_id" class="lms-input">
                <option value="">Select Course</option>
                @foreach ($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (!empty($selectedCourse))
            <p>Price:${{number_format($selectedCourse->price,2)}}</p>

            <div class="mb-4">
                <input wire:model.lazy="payment" type="number" step=".01" max="{{number_format($selectedCourse->price, 2)}}" class="lms-input" placeholder="Payment now">
            </div>
            @include('components.wire-loading-btn')
        @endif

        
    </form>
</div>
