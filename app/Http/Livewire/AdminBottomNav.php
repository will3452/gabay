<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminBottomNav extends Component
{
    public $menushow = false;
    public function render()
    {
        return view('livewire.admin-bottom-nav');
    }
}
