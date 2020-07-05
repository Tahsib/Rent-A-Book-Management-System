@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-3">

        </div>

        <div class="col-lg-6">
            <div class="card bg-light mb-3">

                <div class="card-header">
                    <h2 class="text-center">Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/profile/{{$user->id}}/" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly>
                            @error('username')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            @error('name')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                            @error('email')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            @error('password')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label for="hall">Avatar</label>
                            <div class="form-inline">
                                <input type="file" class="form-control " id="avatar" name="avatar" value="{{$user->avatar}}">

                                <img src="{{$user->avatar}}"
                                     alt=""
                                     width="40"
                                >
                                @error('avatar')
                                <p class="red-text">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="hall">Hall Name</label>
                            <input type="text" class="form-control" id="hall" name="hall" value="{{$user->hall}}" >
                            @error('hall')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="room_no">Room No</label>
                            <input type="text" class="form-control" id="room_no" name="room_no" value="{{$user->room_no}}" >
                            @error('room_no')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" >
                            @error('mobile')
                            <p class="red-text">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>

        <div class="col-lg-3">

        </div>

    </div>

@endsection
