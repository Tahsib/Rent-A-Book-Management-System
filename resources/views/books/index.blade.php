@extends('layouts.app')

@section('content')
    <div>
        <h1>Available books</h1>

        @foreach($books as $book)
            @if(( !$book->isAppliedBy(auth()->user()) ) && ($book->user->id != auth()->id()))
                <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{$book->image}}" class="card-img img-fluid img-thumbnail" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->book_name}}</h5>
                        <p class="card-text"><strong>Writter: </strong>{{$book->writter}}</p>
                        <p class="card-text"><strong>Added By: </strong>{{$book->user->name}}</p>
                        <p class="card-text"><small class="text-muted">Posted at: {{$book->updated_at->diffForHumans()}}</small></p>
                        @if($book->user->id != auth()->id())
                            <div class="card-text">
                                <form method="POST" action="/rent/{{$book->id}}/apply">
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">Apply</button>
                                </form>
                            </div>

                        @endif


                    </div>
                </div>
            </div>
    </div>
            @endif
        @endforeach
    </div>


@endsection
