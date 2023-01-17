<div>
    <h2 class="mb-4 font-semibold">Quiz Name: <span class="font-normal">{{$quiz->name}}</span></h2>
    @if (count($questions)>0)
    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question_id" class="lms-label">Question</label>
            <select class="lms-input" wire:model.lazy='question_id' id="question_id">
                <option value="">Select Question</option>
                @foreach ($questions as $question)
                
                <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
        </div>
        
        @include('components.wire-loading-btn')
        
    </form>
    @else  
    <h2 class="font-bold">No Available Question</h2> 
    @endif
</div>
