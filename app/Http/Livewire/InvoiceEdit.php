<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceEdit extends Component
{
    public $invoice_id;
    public $name;
    public $price;
    public $quantity;
    public $enableAddItem=false;
    public function render()
    {
        $invoice= Invoice::findOrFail($this->invoice_id);
        return view('livewire.invoice-edit',[
            'invoice'=>$invoice
        ]);
    }

    public function addNewItem(){
        $this->enableAddItem=! $this->enableAddItem;
    }

    public function addItem(){
        InvoiceItem::create([
            'name'=> $this->name,
            'price'=>$this->price,
            'quantity'=>$this->quantity,
            'invoice_id'=>$this->invoice_id,

        ]);

        $this->name='';
        $this->price='';
        $this->quantity;

        flash()->addSuccess('Item Added to Invoice');
    }
}
