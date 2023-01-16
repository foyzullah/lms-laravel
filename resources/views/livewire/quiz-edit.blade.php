<form wire:submit.prevent="quizUpdate">
    <div class="mb-4">
        @include('components.form-field',[
            'name'=> 'name',
            'label'=>'quiz',
            'type'=>'text',
            'placeholder'=>'Enter Quize',
            'required'=>'required'
        ])
    </div>

    @include('components.wire-loading-btn')

</form>
