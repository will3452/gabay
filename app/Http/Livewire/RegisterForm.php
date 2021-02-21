<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;
    public $step = 1;

    //step 1
    public $name = '';
    public $mobile_number = '';
    public $type = 'customer';
    public $address = '';
    public $gender = 'male';
    public $picture = null;
    public $valid_id = null;
    public $birthdate = '';
    public $email = '';
    public $password = '';
    public $confirmpassword = '';
    public function next(){
        if($this->step == 1){
            if($this->name  == '' || $this->mobile_number == '' || $this->address == ''){
                return;
            }
        }else if($this->step == 2){
            if($this->birthdate == '' || $this->valid_id == ''){
                return;
            }
        }
        $this->step ++;
    }

    public function prev(){
        $this->step--;
    }

    

    public function render()
    {
        return view('livewire.register-form');
    }
}
