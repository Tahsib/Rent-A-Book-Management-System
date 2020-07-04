<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rents()
    {
        return $this->hasMany(Book::class);
    }

    public function getAvatarAttribute($value)
    {
        if(isset($value)){
            return asset('storage/'.$value);
        }
        else{
            return asset('images/user_default.jpg');
        }
    }

    public function applies()
    {
        return $this->belongsToMany(
            Book::class,
            'rents',
            'applicant_id',
            'book_id');
    }


}
