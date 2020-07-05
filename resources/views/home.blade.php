@extends('layouts.app')

@section('content')
    <h1 class="text-center">Dashboard</h1>
    <div class="row">
        <div class="col-lg-6">
            <h3 class="text-center">Apply Update</h3>
            @forelse($accepted_books as $accepted_book)
                <div class="card">
                    <div class="card-body">
                        {{$accepted_book->user->name}} rented you {{$accepted_book->book_name}}
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        No news on the books applied
                    </div>
                </div>
            @endforelse
        </div>

        <div class="">

        </div>

        <div class="col-lg-6">
            <h3 class="text-center">Rents Update</h3>
            @foreach($books as $book)
                @foreach($book->applies as $user)
                    <div class="card mb-4">
                        <div class="card-body">
                          <a href="/profile/{{$user->id}}">{{$user->name}}</a> applied for {{$book->book_name}}
                            <form method="POST" action="/rent/{{$book->id}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="renter_id" value="{{$user->id}}">
                                <button class="btn btn-secondary" type="submit">Accept</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endforeach
            @if($isAnyoneApplied == 0)
                <div class="card">
                    <div class="card-body">
                        No one applied so far.
                    </div>
                </div>
            @endif
        </div>

    </div>

@endsection
