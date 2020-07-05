<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($value)
    {
        if(isset($value)){
            return asset('storage/'.$value);
        }
        else{
            return asset('/images/book_default.png');
        }
    }

    public function applies()
    {
        return $this->belongsToMany(
            User::class,
            'rents',
            'book_id',
            'applicant_id');
    }
    public function apply(User $user)
    {
        return $this->applies()->save($user);
    }
    public function unapply(User $user)
    {
        return $this->applies()->detach($user);
    }

    public function isAppliedBy(User $user)
    {
        return $this->applies()
            ->where('applicant_id',$user->id)
            ->exists();
    }

    public function toogleApply(User $user)
    {
        if($this->isAppliedBy($user)){
            return $this->unapply($user);
        }
        else{
            return $this->apply($user);
        }
    }
}
