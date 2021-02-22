<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BookForm extends Component
{
    use WithFileUploads;
    public $service;
    public $step = 1;
    public $show = false;
    public $address = '';
    public function showForm(){
        if($this->step == 2){
            $this->submit();
        }

        $this->step++;
        $this->show = true;
    }

    public function submit(){


    }
    public function render()
    {
        return view('livewire.book-form');
    }
}
