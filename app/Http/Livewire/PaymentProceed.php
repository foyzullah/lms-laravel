<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Stripe\StripeClient;

class PaymentProceed extends Component
{
    public $invoice;
    public function render()
    {

        return view('livewire.payment-proceed',[
            'invoice'=>$this->invoice
        ]);
    }

    public function refund($payment_id){
        $payment = Payment::findOrFail($payment_id);
        if(strlen($payment->transection_id)===8){
            $payment -> delete();
            flash()->addSuccess('Cash payment refunded');

        }else{
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $stripe->refunds->create([
                'charge'=>$payment->transection_id
            ]);

            $payment->delete();

            flash()->addSuccess('Stripe payment refunded');
        }

        return redirect(route('invoice.show', $this->invoice->id));
    }

    
}
