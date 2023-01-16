<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">Quiz</th>
            <th class="border px-4 py-2">Quiz Created</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($quizzes as $quiz)
            
        <tr>
            <td class="border px-4 py-2 text-center">{{$quiz->name}}</td>
            <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($quiz->created_at))}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class='mr-2 bg-green-700 text-white p-0.5 rounded' href="{{route('quiz.edit', $quiz->id)}}">@include('components.icons.edit')</a>
                    <form action="" onsubmit="return confirm('Are you sure?');" wire:submit.prevent='deleteQuiz({{$quiz->id}})'>
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
