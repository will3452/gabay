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

//helper
    public function getAverageStarAttribute(){
        return $this->feedbacks()->average('star') ?? 5;
    }
//relation

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

}
