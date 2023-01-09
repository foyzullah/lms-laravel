<form wire:submit.prevent="formSubmit">
    <div class="mb-4">
        <label for="name" class="lms-label">Name</label>
        <input wire:model.lazy="name" id="name" class="lms-input" type="text">
        @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
        @enderror
    </div>

    <h3 class="font-semibold mb-2">Permissions</h3>
    <div class="flex flex-wrap -mx-4">
        @foreach ($permissions as $permission)
            <div class="w-1/3 px-4 mb-4">
                <label class="inline-flex items-center"> 
                    <input type="checkbox" wire:model.lazy="selectedPermissions" value="{{$permission->name}}" class="form-checkbox">
                    <span class="ml-2">{{$permission->name}}</span>
                </label>
            </div>
        @endforeach
    </div>



    @include('components.wire-loading-btn')
    
</form>
