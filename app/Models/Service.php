<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getSystemRateAttribute(){
        return $this->rate + ($this->rate * .2);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
