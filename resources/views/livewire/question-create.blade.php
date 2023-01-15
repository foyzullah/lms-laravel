<form wire:submit.prevent='submitQuestion'>
    <div class="mb-4">
        @include('components.form-field',[
            'name'=>'name',
            'label'=>'Question',
            'type'=>'text',
            'placeholder'=> 'Enter Question',
            'required'=> 'required'
        ])
    </div>

    @foreach ($options as $option)
        
    <div class="mb-4">
        @include('components.form-field',[
            'name'=>'option_'.$option,
            'label'=>'Option ' .ucfirst($option),
            'type'=>'text',
            'placeholder'=> 'Enter Option '. ucfirst($option),
            'required'=> 'required'
            ])
    </div>
    @endforeach

    <div class="mb-4">
        <label for="correct_answer" class="lms-label">Correct Answer</label>
        <select wire:model.prevent='correct_answer' class="lms-input" name="" id="correct_answer">
            @foreach ($options as $option)
            <option  value="{{$option}}">{{ucfirst($option)}}</option>
            @endforeach
        </select>
    </div>

    @include('components.wire-loading-btn')
</form>
