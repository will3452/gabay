<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class ProfileCardList extends Component
{
    public $account;
    public $viewmore = false;

    
    public function render()
    {
        return view('livewire.profile-card-list');
    }

    public function delete(){
        $this->account->user()->delete();
        return redirect()->route('admins.applications.index');
    }
   
    public function approve(){
        $this->account->approved_at = now();
        $res = $this->account->user->services()->first();
        $res->approved_at = now();
        $res->save();
        $this->account->save();
        return redirect()->route('admins.applications.index');
    }
}
