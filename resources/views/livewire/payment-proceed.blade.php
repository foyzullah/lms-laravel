<div>
    <div class="bg-gray-300 rounded p-4 mb-4">
        <h2 class="font-bold">Invoice to:</h2>
        <h4 class="font-bold">Name: <span class="font-normal">{{$invoice->user->name}}</span> </h4>
        <h4 class="font-bold">E-mail: <span class="font-normal">{{$invoice->user->email}}</span> </h4>
    </div>

    <table class="w-full table-auto mb-4">
        <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Quantity</th>
            <th class="border px-4 py-2 text-right">Total</th>
        </tr>

        @foreach ($invoice->items as $item)
            
        <tr>
            <td class="border px-4 py-2 text-center">{{$item->name}}</td>
            <td class="border px-4 py-2 text-center">{{date_format($item->created_at,'F j, Y')}}</td>
            <td class="border px-4 py-2 text-center">${{number_format($item->price,2)}}</td>
            <td class="border px-4 py-2 text-center">{{$item->quantity}}</td>
            <td class="border px-4 py-2 text-right">${{number_format(($item->price * $item->quantity),2)}}</td>
        </tr>
        @endforeach

        <tr>
            <td class="border px-4 py-2 text-right font-bold" colspan="4">Subtotal</td>
            <td class="border px-4 py-2 text-right">${{$invoice->amount()['total']}}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2 text-right font-bold" colspan="4">Paid</td>
            <td class="border px-4 py-2 text-right">${{$invoice->amount()['paid']}}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2 text-right font-bold" colspan="4">Due</td>
            <td class="border px-4 py-2 text-right">${{$invoice->amount()['due']}}</td>
        </tr>
    </table>

    <h3 class="font-bold text-lg mb-2">Payments</h3>
    <ul class="mb-4">
        @foreach($invoice->payments as $payment)
        <li>{{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->amount, 2)}}</li>
        @endforeach
    </ul>
</div>
