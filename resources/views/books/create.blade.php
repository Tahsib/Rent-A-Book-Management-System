@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <h2 class="text-center">Add Books for Rent</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/books">
                        @csrf
                        <div class="form-group">
                            <label for="book_name">Name</label>
                            <input type="text" class="form-control" id="book_name" name="book_name">

                        </div>

                        <div class="form-group">
                            <label for="writter">Writter</label>
                            <input type="text" class="form-control" id="writter" name="writter" >
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" >
                        </div>

                        <input type="hidden" class="form-control" id="renter_id" name="renter_id" value=0 >
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            <div>
        </div>

        <div class="col-lg-3">

        </div>

    </div>

@endsection
