<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($leads as $lead) 
        <tr>
            <td class="border px-4 py-2">{{$lead->name}}</td>
            <td class="border px-4 py-2">{{$lead->email}}</td>
            <td class="border px-4 py-2">{{$lead->phone}}</td>
            <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($lead->created_at))}}</td>
            <td class="border px-4 py-2">
                <div class="flex items-center justify-center">
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('leads.edit',$lead->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('leads.show',$lead->id)}}">
                        @include('components.icons.eye')
                    </a>
                    <form action="" onsubmit="return confirm('Are you sure?');" wire:submit.prevent='deleteLead({{$lead->id}})'>
                        <button type="submit" class="block bg-green-700 text-white p-0.5 rounded">
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{$leads->links()}}
    </div>
</div>
