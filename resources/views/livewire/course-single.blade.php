<div>
{{$course}}

<div class="container mx-auto">
    <div class="bg-green-400 rounded p-4 mb-4">
        <h2 class="font-bold mb-2">Course Name: <span class="font-normal">{{$course->name}}</span> </h2>
        <p class="font-bold">Course Description: <span class="font-normal">{{$course->description}}</span> </p>
    </div>
</div>
<table class="w-full table-auto">
    <tr>
        <th class="border">Sl</th>
        <th class="border">Topic</th>
        <th class="border">Actions</th>
    </tr>

    @foreach ($course->curriculums as $curriculum)
        
    <tr>
        <td class="border text-center">{{$curriculum->id}}</td>
        <td class="border">{{$curriculum->name}}</td>
        <td class="border">
            <div class="flex items-center justify-center">
                <a class="mr-1" href="">
                    @include('components.icons.edit')
                </a>

                <a class="mr-1" href="{{route('invoice.show', $curriculum->id)}}">
                    @include('components.icons.eye')
                </a>

                <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="invoiceDelete({{$curriculum->id}})">
                    <button type="submit">
                        @include('components.icons.trash')
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
</div>
