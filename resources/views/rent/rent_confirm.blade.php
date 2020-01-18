@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p>Are you sure you want to rent {{$rent->book_name}}</p>
                <form action="/rent/user/{{$rent->id}}" method="post">
                    @method('PATCH')
                    @csrf
                        <input type="hidden"  name="book_name" value="{{$rent->book_name}}">
                        <input type="hidden"  name="writer" value="{{$rent->writer}}">
                        <input type="hidden"  name="address" value="{{$rent->address}}">
                        <input type="hidden"  name="contact" value="{{$rent->contact}}">
                        <input type="hidden"  name="rent" value="{{$rent->rent}}">
                        <input type="hidden"  name="time" value="{{$rent->time}}">
                        <input type="hidden"  name="user_id" value="{{$rent->user_id}}">
                        <input type="hidden" name="status" value="0">
                        <button type="submit" class="btn btn-primary">YES</button>
                </form>
                 <a href="/rents" class="btn btn-danger">NO</a>
            </div>
        </div>
    </div>
@endsection
