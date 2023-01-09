<div>
    <h2 class="font-bold text-center mb-3 text-xl">All Users</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Registered</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td class="border px-4 py-2">{{$user->name}}</td>
            <td class="border px-4 py-2">{{$user->email}}</td>
            <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($user->created_at))}}</td>
        </tr>
        @endforeach
    </table>
</div>
