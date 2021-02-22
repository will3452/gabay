<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;

class ApplicationList extends Component
{
    public $accountx;
    public function mount(){
        $this->accountx = $this->accounts();
    }
    public function accounts(){
        return Account::ACCOUNTNOTAPPROVED();
}
    public function render()
    {
        return view('livewire.application-list');
    }
}
