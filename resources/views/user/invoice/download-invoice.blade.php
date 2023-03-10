<x-guest-layout>
    <div class="container">
        <div class="bg-gray-300 rounded p-4 mb-4 flex justify-between items-center">
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
                <th style="text-align: right" >Total</th>
            </tr>
    
            @foreach ($invoice->items as $item)
                
            <tr>
                <td class="border px-4 py-2 text-center">{{$item->name}}</td>
                <td class="border px-4 py-2 text-center">{{date_format($item->created_at,'F j, Y')}}</td>
                <td class="border px-4 py-2 text-center">${{number_format($item->price,2)}}</td>
                <td class="border px-4 py-2 text-center">{{$item->quantity}}</td>
                <td style="text-align: right">${{number_format(($item->price * $item->quantity),2)}}</td>
            </tr>
            @endforeach
    
            <tr>
                <td style="text-align: right" colspan="4">Subtotal</td>
                <td style="text-align: right">${{$invoice->amount()['total']}}</td>
            </tr>
            <tr>
                <td style="text-align: right" colspan="4">Paid</td>
                <td style="text-align: right">${{$invoice->amount()['paid']}}</td>
            </tr>
            <tr>
                <td style="text-align: right" colspan="4">Due</td>
                <td style="text-align: right">${{$invoice->amount()['due']}}</td>
            </tr>
        </table>
    
        @if (count($invoice->payments)!=0)
        
        <h3 class="font-bold text-lg mb-2">Payment History</h3>
        <table class="w-full table-auto mb-4">
            <tr>
                <th class="border px-2 py-1">Transection Date</th>
                <th class="border px-2 py-1">Transection Amount</th>
                <th class="border px-2 py-1">Transection ID</th>
            </tr>
            @foreach($invoice->payments as $payment)
            <tr>
                <td class="border px-2 py-2 text-center">{{date('F j, Y - g:i:a', strtotime($payment->created_at))}}</td>
                <td class="border px-2 py-2 text-center">${{number_format($payment->amount, 2)}}</td>
                <td class="border px-2 py-2 text-center">{{$payment->transection_id}}</td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</x-guest-layout>

<style>
    table{
        width: 100% auto;
    }

    table,th, td{
        border: 1px solid black;
        text-align: center;
        padding: 5px;
    }

</style>