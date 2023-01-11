<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2 text-left">Course Name</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Quantity</th>
        </tr>
        <tr>
            <td class="border px-4 py-2 text-center">{{$invoice_items->id}}</td>
            <td class="border px-4 py-2">{{$invoice_items->name}}</td>
            <td class="border px-4 py-2 text-center">{{$invoice_items->price}}</td>
            <td class="border px-4 py-2 text-center">{{$invoice_items->quantity}}</td>
        </tr>
    </table>
</div>
