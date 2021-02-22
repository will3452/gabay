<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getPublicPictureAttribute(){
        $path = $this->picture;
        $arr = explode('/', $path);
        return '/storage/picture/'.end($arr);
    }
    public function getPublicValidIdAttribute(){
        $path = $this->valid_id;
        $arr = explode('/', $path);
        return '/storage/valid_id/'.end($arr);
    }


    //stat
    public static function ACCOUNTNOTAPPROVED(){
        return  self::where('type','provider')->whereNull('approved_at')->get();
    }
}
