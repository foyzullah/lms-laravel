<div>
    <div class="border rounded bg-gray-300 p-4 mb-4">
        <h3 class="font-bold">Invoice To: </h3>
        <h4 class="font-bold">Name: <span class="font-normal">{{$invoice->user->name}}</span></h4>
        <h4 class="font-bold">Email: <span class="font-normal">{{$invoice->user->email}}</span> </h4>
    </div>

    <table class="w-full table-auto mb-4">
        <tr>
            <th class="px-4 py-2 border text-left">Name</th>
            <th class="px-4 py-2 border">Price</th>
            <th class="px-4 py-2 border">Quantity</th>
            <th class="px-4 py-2 border text-right">Total</th>
        </tr>
        @foreach ($invoice->items as $item)
            
        <tr>
            <td class="px-4 py-2 border">{{$item->name}}</td>
            <td class="px-4 py-2 border text-center">{{$item->price}}</td>
            <td class="px-4 py-2 border text-center">{{$item->quantity}}</td>
            <td class="px-4 py-2 border text-right">{{number_format($item->price *$item->quantity, 2)}}</td>
        </tr>

        @endforeach
        <tr>
            <td class="px-4 py-2 border text-right" colspan='3'>Subtotal</td>
            <td class="px-4 py-2 border text-right">{{number_format($invoice->amount()['total'],2)}}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 border text-right" colspan='3'>Paid</td>
            <td class="px-4 py-2 border text-right">{{number_format($invoice->amount()['paid'],2)}}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 border text-right" colspan='3'>Due</td>
            <td class="px-4 py-2 border text-right">{{number_format($invoice->amount()['due'],2)}}</td>
        </tr>
    </table>

    @if($enableAddItem)
    <form action="" wire:submit.prevent="addItem">
        <div class="flex">
            <div class="w-full">
                @include('components.form-field',[
                    'name'=>'name',
                    'label'=>'Name',
                    'type'=>'text',
                    'placeholder'=> 'Item Name',
                    'required'=> 'required'
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field',[
                    'name'=>'price',
                    'label'=>'Price',
                    'type'=>'number',
                    'placeholder'=> 'Item Price',
                    'required'=> 'required'
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field',[
                    'name'=>'quantity',
                    'label'=>'Quantity',
                    'type'=>'number',
                    'placeholder'=> 'Item quantity',
                    'required'=> 'required'
                ])
            </div>
            
        </div>
        <div class="flex items-center mt-4">

            @include('components.wire-loading-btn')
            <button type="button" wire:click="addNewItem" class="ml-2 border py-2 px-4 inline-block rounded">Cancle</button>
        </div>
    </form>

    @else 
        <button class="underline" wire:click='addNewItem'>Add</button>
    @endif
</div>
