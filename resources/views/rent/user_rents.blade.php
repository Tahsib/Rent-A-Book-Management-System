@extends('layouts.app')

@section('content')
    <style>
        .image{
            margin-left:auto;
            margin-right:auto;
            margin-top: 5px;
            height:250px;
            width:auto;
        }
    </style>
    <div class="container">
        <h4>{{$user->name}}'s Books</h4>
        <div class="row">
            @foreach($rents as $rent)
                @if($rent->status == 1 && $rent->user_id == $user->id)
                    <div class="col-lg-3 p-2">
                        <div class="card text-center ">
                            @if($rent->image!=Null)
                                <img src="{{asset('storage/'.$rent->image)}}" class="card-img-top image" alt="..."/>
                            @else
                                <img src="{{asset('images/frontend/book.png')}}" class="card-img-top image" alt="..."/>
                            @endif
                            <div class="card-body">
                                <p class="card-tite"><a href="/rent/{{$rent->id}}">{{$rent->book_name}}</a></p>
                                <p class="card-text">{{$rent->writer}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
