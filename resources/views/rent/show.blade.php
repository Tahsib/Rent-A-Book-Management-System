@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$rent->book_name}} by {{$rent->writer}}</h5>
                <p class="card-text">Rent: {{$rent->rent}} for {{$rent->time}}days</p>
                <p class="card-text">Renter: </p>
                <a href="/rent/confirm/{{$rent->id}}" class="btn btn-primary">Rent</a>
            </div>
        </div>
    </div>
@endsection
