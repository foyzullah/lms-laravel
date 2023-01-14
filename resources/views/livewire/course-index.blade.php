<div>

    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2">Thumbnail</th>
            <th class="border px-4 py-2">Teacher</th>
            <th class="border px-4 py-2">Duration</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($courses as $course)
            
        <tr>
            <td class="border px-4 py-2">{{$course->name}}</td>
            <td class="border px-4 py-2">Thumbnail</td>
            <td class="border px-4 py-2">Teacher</td>
            <td class="border px-4 py-2 text-center">Duration</td>
            <td class="border px-4 py-2 text-center">{{$course->price}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('course.edit',$course->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('course.show',$course->id)}}">
                        @include('components.icons.eye')
                    </a>
                    <form action="" onsubmit="return confirm('Are you sure?');" wire:submit.prevent='deleteLead({{$course->id}})'>
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
