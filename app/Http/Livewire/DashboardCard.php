<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardCard extends Component
{

    public $menuLink = '';
    public $menuName = '';
    public $menuImage = '';

    public function goto(){
        return redirect()->to($this->menuLink);
    }

    public function render()
    {
        return view('livewire.dashboard-card');
    }

}
