@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <p>Book Name</p>
            </div>
            <div class="col-lg-4">
                <p>Writer</p>
            </div>
            <div class="col-lg-4">
                <p>Rent</p>
            </div>
        </div>
        <div class="row">
            @foreach($rents as $rent)
                @if($rent->rent_id == $userId)
                <div class="col-lg-4">
                    <a href="/rent/{{$rent->id}}">{{$rent->book_name}}</a>
                </div>
                <div class="col-lg-4">
                    <p>{{$rent->writer}}</p>
                </div>
                <div class="col-lg-4">
                    <p>{{$rent->rent}}</p>
                </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
