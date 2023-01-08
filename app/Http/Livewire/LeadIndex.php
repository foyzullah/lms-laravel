<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {

        $leds = Lead::paginate(10);
        return view('livewire.lead-index', [
            'leads' => $leds
        ]);
    }

    public function deleteLead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        flash()->addSuccess('Lead successfully deleted');
    }
}
