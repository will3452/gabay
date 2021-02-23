<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Component
{
    use WithFileUploads;

    
    protected $rules = [
        'email' => 'required|email|unique:users'
    ];

    //step 1
    
    public $email;
    public $valid_id;
    public $type = 'customer';
    public $gender = 'male';
    public $picture;
    public $step = 1;
    public $name = '';
    public $mobile_number = '';
    public $address = '';
    public $birthdate = '';
    public $opassword = '';
    public $cpassword = '';
    public $password_error_message = '';
    public $required_error = false;
    public $serviceName = '';
    public $serviceRate = '';
    //submit
    public function submit(){
        
        $user = User::create([
            'email'=>$this->email,
            'password'=>Hash::make($this->opassword),
            'name'=>$this->name
        ]);
        $account = $user->account()->create([
            'type' => $this->type,
            'birthdate' => $this->birthdate,
            'mobile_number'=> $this->mobile_number,
            'address' => $this->address,
            'gender' => $this->gender,
            'valid_id' => $this->valid_id->store('public/valid_id'),
            'picture' => $this->picture->store('public/picture') 
        ]);
        if($account->type == 'provider'){
            $user->services()->create([
                'name'=>$this->serviceName,
                'rate'=>$this->serviceRate
            ]);
        }
        alert()->success('regisration', 'success');
        return redirect()->to('/registered-successfully');
    }
    
    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    // public function updatedConfirmpassword(){
    //     if($this->password == $this->confirmpassword){
    //         $this->password_error_message = 'Password Matched.';
    //         return;
    //     }
    //     $this->password_error_message = 'These password did\'nt match. try again.';
    // }
    
    public function next($arr){
        if($this->step == 3){
            if(!$this->validate()) return; 
            if($this->opassword != $this->cpassword){
                $this->password_error_message = 'The passwords must match.';
                return;
            }


        }
        $this->password_error_message = null;

        foreach($arr as $a){
            if(empty($a)){
                $this->required_error = true;
                return;
            }
        }
        $this->required_error = false;
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
