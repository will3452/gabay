<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FeedbackShower extends Component
{
    public $service;
    public $showFeedback= false;

    public function render()
    {
        return view('livewire.feedback-shower');
    }
}
