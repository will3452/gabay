<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }
}
