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
}
