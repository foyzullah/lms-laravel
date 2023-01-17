<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentProceed extends Component
{
    public $invoice;
    public function render()
    {

        return view('livewire.payment-proceed',[
            'invoice'=>$this->invoice
        ]);
    }
}
