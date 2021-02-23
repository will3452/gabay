<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPendingBooksCountAttribute(){
        return $this->books()->where('status', 'pending')->count();
    }

    public function getPendingRequestsCountAttribute(){
        return $this->services()->whereHas('books', function(Builder $query){
            $query->where('status', 'pending');
        })->count();
    }

    public function account(){
        return $this->hasOne(Account::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function feedbacks(){ //customer relation
        return $this->hasMany(Feedback::class);
    }
}
