<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserBottomNav extends Component
{
    public $menushow = false;
    public function render()
    {
        return view('livewire.user-bottom-nav');
    }
}
