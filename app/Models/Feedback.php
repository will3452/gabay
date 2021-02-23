<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function user(){ // customer
        return $this->belongsTo(User::class);
    }
}
