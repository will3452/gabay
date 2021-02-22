<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class SearchServiceResult extends Component
{
    public $account;
    public $service_id;

    public function mount(){
         $this->account = Service::find($this->service_id)->user->account;
    }

    public function render()
    {
        return view('livewire.search-service-result');
    }
}
