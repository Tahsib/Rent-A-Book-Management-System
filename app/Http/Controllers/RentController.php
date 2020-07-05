<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

class RentController extends Controller
{

    public function store(Book $book)
    {
        $book->toogleApply(auth()->user());
        return back();
    }
    public function update(Book $book)
    {
        $book->renter_id = auth()->id();
        $book->save();
        return redirect('/books');
    }
}
