<form wire:submit.prevent="formSubmit">
    <div class="mb-4">
        <label for="name" class="lms-label">Name</label>
        <input wire:model.lazy="name" id="name" class="lms-input" type="text">
        @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="email" class="lms-label">Email</label>
        <input wire:model.lazy="email" id="email" class="lms-input" type="email">
        @error('email')
            <div class="text-red-500 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="lms-label">Password</label>
        <input wire:model.lazy="password" id="password" class="lms-input" type="password">
        @error('password')
            <div class="text-red-500 text-sm">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="role" class="lms-label">Role</label>
        <select wire:model.lazy="role" id="role" class="lms-input">
            <option value="">Select Role</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>

        @error('role')
            <div class="text-red-500 text-sm mt-2">{{$message}}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')
</form>
