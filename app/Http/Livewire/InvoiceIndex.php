<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceIndex extends Component
{
    public function render()
    {

        $invoices = Invoice::with(['user', 'payments', 'invoice_items'])->get();
        return view('livewire.invoice-index',[
            'invoices'=>$invoices
        ]);
    }
}
