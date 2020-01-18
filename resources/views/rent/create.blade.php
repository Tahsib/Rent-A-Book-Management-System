@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/rent" method="post">
            @csrf
            <div class="form-group">
                <label for="book_name">Book Name</label>
                <input type="text" class="form-control" name="book_name">
                @error('book_name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="writer">Writer</label>
                <input type="text" class="form-control" name="writer">
                @error('writer')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address">
                @error('address')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact">
                @error('contact')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="rent">Rent</label>
                <input type="text" class="form-control" name="rent">
                @error('rent')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" name="time">
                @error('time')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <input type="hidden" name="status" value="1">

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
