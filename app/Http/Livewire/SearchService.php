<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class SearchService extends Component
{
    public $services;
    public $result = [];
    public $selected = '';

    public function updatedSelected(){
        $this->result = Service::where('user_id', '!=', auth()->user()->id)->where('name', $this->selected)->whereNotNull('approved_at')->with('user')->get();
    }
    public function render()
    {
        return view('livewire.search-service');
    }
}
