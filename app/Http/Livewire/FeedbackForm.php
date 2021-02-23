<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FeedbackForm extends Component
{
    public $book;
    public $showForm = false;
    public $stars = 3;
    public function render()
    {
        return view('livewire.feedback-form');
    }
}
