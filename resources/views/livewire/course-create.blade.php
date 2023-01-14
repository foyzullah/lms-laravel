<div>
    <form wire:submit.prevent='formSubmit'>
        <div class="mb-6">
            @include('components.form-field',[
                'name'=>'name',
                'label'=>'name',
                'type'=>'text',
                'placeholder'=> 'Enter Name',
                'required'=> 'required'
            ])
        </div>
        <div class="mb-6">
            @include('components.form-field',[
                'name'=>'description',
                'label'=>'description',
                'type'=>'textarea',
                'placeholder'=> 'Enter Description',
                'required'=> 'required'
            ])
        </div>
        <div class="mb-6">
            @include('components.form-field',[
                'name'=>'price',
                'label'=>'price',
                'type'=>'number',
                'placeholder'=> 'Add price',
                'required'=> 'required'
            ])
        </div>

        <div class="flex items-center mb-6">
            <div class="w-full mr-4">
                <label for="days" class="lms-label">Days</label>
            <div class="flex flex-wrap -mx-2">
                @foreach($days as $day)
                    <div class="min-w-max flex items-center px-2">
                        <input wire:model.lazy='selectedDays' type="checkbox" value="{{$day}}" id="{{$day}}"> 
                        <label class="ml-2" for="{{$day}}">{{ucfirst($day)}}</label>
                    </div>
                @endforeach
            </div>
            </div>
            <div class="min-w-max mr-4">
                <div class="mb-6">
                    @include('components.form-field',[
                        'name'=>'time',
                        'label'=>'time',
                        'type'=>'time',
                        'placeholder'=> 'Enter time',
                        'required'=> 'required'
                    ])
                </div>
            </div>
            <div class="min-w-max">
                <div class="mb-6">
                    @include('components.form-field',[
                        'name'=>'end_date',
                        'label'=>'End Date',
                        'type'=>'date',
                        'placeholder'=> 'Enter End Date',
                        'required'=> 'required'
                    ])
                </div>
            </div>
        </div>

        @include('components.wire-loading-btn')
    </form>
</div>
