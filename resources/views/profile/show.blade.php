@extends('layouts.app')

@section('content')
<div>
    <div class="card mb-3" >
        <div class="row no-gutters">
            <div class="col-md-3">
                <img src="{{$user->avatar}}" class="card-img" style="height: 300px; width: 250px" alt="" >
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h3 class="card-title">{{$user->name}}</h3>
                    <p class="card-text"><strong>Hall: </strong>{{$user->hall}}</p>
                    <p class="card-text"><strong>Room: </strong>{{$user->room_no}}</p>
                    <p class="card-text"><strong>Mobile: </strong>{{$user->mobile}}</p>

                    <p class="card-text"><small class="text-muted">Added {{$user->created_at->diffForHumans()}}</small></p>
                    <a class="btn btn-secondary" href="/profile/{{$user->id}}/edit">Edit</a>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <h3>{{$user->username}}'s books for rent</h3>
    @foreach($books as $book)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{$book->image}}" class="card-img img-fluid img-thumbnail" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$book->book_name}}</h5>
                    <p class="card-text">{{$book->writter}}</p>
                    <p class="card-text"><small class="text-muted">Added at {{$book->updated_at->diffForHumans()}}</small></p>
                </div>
            </div>
        </div>
    </div>
        @endforeach
</div>
@endsection
