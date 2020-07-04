<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('books.index',compact('books'));
    }


    public function create()
    {
        return view('books.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'book_name'=>'required|min:3|max:255',
            'writter'=>'required|min:3|max:255',
            'category'=>'min:3|max:255'
        ]);

        Book::create([
            'book_name'=>$attributes['book_name'],
            'writter'=>$attributes['writter'],
            'category'=>$attributes['category'],
            'user_id'=>auth()->id()
        ]);

        return redirect('/home');


    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {
        //
    }


    public function update(Request $request, Book $book)
    {
        //
    }


    public function destroy(Book $rent)
    {
        //
    }
}
