<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($roles as $role) 
        <tr>
            <td class="border px-4 py-2">{{$role->name}}</td>
            
            <td class="border px-4 py-2">
                @foreach ($role->permissions as $permission)
                <span class="inline-block bg-blue-300 p-1 rounded text-white">
                    {{$permission->name}}
                </span>
                @endforeach
            </td>
            
            <td class="border px-4 py-2">
                <div class="flex items-center justify-center">
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('leads.edit',$role->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <form action="" onsubmit="return confirm('Are you sure?');" wire:submit.prevent='deleteLead({{$role->id}})'>
                        <button type="submit" class="block bg-green-700 text-white p-0.5 rounded">
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
