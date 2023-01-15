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
        </tr>

        @foreach ($questions as $question)
            
        <tr>
            <td class="border px-3 py-2 text-center">{{$question->name}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_a}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_b}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_c}}</td>
            <td class="border px-3 py-2 text-center">{{$question->option_d}}</td>
            <td class="border px-3 py-2 text-center">{{$question->correct_answer}}</td>
        </tr>
        @endforeach
    </table>
</div>
