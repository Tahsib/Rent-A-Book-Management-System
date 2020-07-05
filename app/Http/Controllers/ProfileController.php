<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show',[
            'user'=>$user,
            'books'=>$user->books()->paginate(20)
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit',compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username'=>['string','required',Rule::unique('users')->ignore($user)],
            'name'=>'string|required|min:5|max:100',
            'email'=>['required','email','max:255',Rule::unique('users')->ignore($user)],
            'password'=>'string|required|min:8|max:255|confirmed',
            'hall'=>'string|min:2|max:50',
            'room_no'=>'integer',
            'mobile'=>'string|min:11|max:11',
            'avatar'=>'file'
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatar');
        }

        $attributes['password'] = Hash::make(request('password'));
        $user->update($attributes);
        return redirect('/home');

    }
}
