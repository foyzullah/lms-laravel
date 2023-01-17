<div>

    <div class="bg-gray-300 mb-4 p-4 rounded">
        <h3 class="font-semibold">Correct answer: <span class="font-normal">{{$correctAnswers}}</span> </h3>
        <h3 class="font-semibold">Wrong answer: <span class="font-normal">{{$wrongAnswers}}</span> </h3>
    </div>

    <span class="bg-red-100 bg-green-100"></span>
    
    @foreach ($quiz->questions as $question)
    <div class="mb-4 border p-4 rounded @if(array_key_exists($question->id, $answered)) bg-{{$answered[$question->id]? 'green':'red'}}-100 @endif">
        <h4 class="font-bold mb-4">{{$question->name}}</h4>
        <div class="flex">
            <div class="mr-4">
                <input wire:model='answer' wire:change.prevent='check' @if(array_key_exists($question->id, $answered)) disabled @endif value='a, {{$question->id}}' name='option-{{$question->id}}' id="option_a-{{$question->id}}" type="radio">
                <label for="option_a-{{$question->id}}">{{$question->option_a}}</label>
            </div>
            <div class="mr-4">
                <input wire:model='answer' wire:change.prevent='check' @if(array_key_exists($question->id, $answered)) disabled @endif value='b, {{$question->id}}' name='option-{{$question->id}}' id="option_b-{{$question->id}}" type="radio">
                <label for="option_b-{{$question->id}}">{{$question->option_b}}</label>
            </div>
            <div class="mr-4">
                <input wire:model='answer' wire:change.prevent='check' @if(array_key_exists($question->id, $answered)) disabled @endif value='c, {{$question->id}}' name='option-{{$question->id}}' id="option_c-{{$question->id}}" type="radio">
                <label for="option_c-{{$question->id}}">{{$question->option_c}}</label>
            </div>
            <div class="mr-4">
                <input wire:model='answer' wire:change.prevent='check' @if(array_key_exists($question->id, $answered)) disabled @endif value='d, {{$question->id}}' name='option-{{$question->id}}' id="option_d-{{$question->id}}" type="radio">
                <label for="option_d-{{$question->id}}">{{$question->option_d}}</label>
            </div>
        </div>
    </div>
        
    @endforeach
</div>
