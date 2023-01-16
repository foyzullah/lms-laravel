<div>
    {{-- <h2>Question Index</h2>

    {{$questions}} --}}

    <table class="w-full table-auto">
        <tr>
            <th class="border px-3 py2">Question</th>
            <th class="border px-3 py2">Option A</th>
            <th class="border px-3 py2">Option B</th>
            <th class="border px-3 py2">Option C</th>
            <th class="border px-3 py2">Option D</th>
            <th class="border px-3 py2">Correct Answer</th>
            <th class="border px-3 py2">Actions</th>
        </tr>

        @foreach ($questions as $question)
            
        <tr>
            <td class="border px-3 py-2 text-center">{{$question->name}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_a}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_b}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_c}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_d}}</td>
            <td class="border px-3 py-2 text-center">{{$question->correct_answer}}</td>
            <td class="border px-3 py-2 text-center">
                <div class="flex items-center justify-center">

                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('question.edit', $question->id)}}">@include('components.icons.edit')</a>
                    <form action="" onsubmit="return confirm('Are you sure?');" wire:submit.prevent='deleteQuestion({{$question->id}})'>
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
