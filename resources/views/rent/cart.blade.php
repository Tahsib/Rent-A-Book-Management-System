@extends('layouts.app')

@section('content')
    <style>
        .img{
            height: 150px;
            width: auto;
        }
    </style>
    <div class="container">
        <div class="row">
            @foreach($rents as $rent)
                @if($rent->rent_id == $userId)
                    <div class="col-lg-8">
                        <div class="card text-center">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    @if($rent->image!=Null)
                                    <img src="{{asset('storage/'.$rent->image)}}" class="card-img img" alt="...">
                                        @else
                                        <img src="{{asset('images/frontend/book.png')}}" class="card-img img" alt="...">
                                        @endif
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <p class="card-tite"><a href="/rent/{{$rent->id}}">{{$rent->book_name}}</a></p>
                                        <p class="card-text">{{$rent->writer}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
