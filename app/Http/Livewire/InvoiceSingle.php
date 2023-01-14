<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceSingle extends Component
{
    public $invoice_id;
    
    public function render()
    {

        $invoice_items = InvoiceItem::where('invoice_id', $this->invoice_id)->get();
        return view('livewire.invoice-single',[
            'invoice_items' => $invoice_items
        ]);
    }
}
