<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadInvoiceController extends Controller
{

    public function show($id)
    {
        $lms_invoice = Invoice::findOrFail($id);

        // $customer = new Buyer([
        //     'name'          => $lms_invoice->user->name,
        //     'custom_fields' => [
        //         'email' =>$lms_invoice->user->email ,
        //     ],
        // ]);

        // $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        // $invoice = InvoicesInvoice::make()
        //     ->buyer($customer)
        //     ->discountByPercent(10)
        //     ->taxRate(15)
        //     ->shipping(1.99)
        //     ->addItem($item);

        // return $invoice->stream();

        $data = [
            'invoice' => $lms_invoice,
        ];

        $pdf = PDF::loadView('user.invoice.download-invoice', $data);

        return $pdf->download('invoice.pdf');

    }

}
