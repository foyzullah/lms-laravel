<label for="{{$name}}" class="lms-label">{{$label}}</label>
@if ($type=='textarea')
<textarea wire:model.lazy='{{$name}}' name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" {{$required}} class="lms-input"></textarea>
@else
<input wire:model.lazy='{{$name}}' type="{{$type}}" id="{{$name}}" placeholder="{{$placeholder}}" {{$required}} class="lms-input">
    
@endif

@error($name)
<div class="text-red-500 text-sm mt-2">{{$message}}</div>  
@enderror