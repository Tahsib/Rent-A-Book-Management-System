<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $my_books = Book::where('user_id',auth()->id())->where('renter_id',0)->get();
        $accepted_books = auth()->user()->applies->where('renter_id',auth()->id());
        $isAnyApplication =  Book::where('user_id',auth()->id())
            ->where('renter_id',0)
            ->get()
            ->map(function($book){return $book->applies->pluck('id')->count();})
            ->filter(function($num){return $num>1;})
            ->count();


        return view('home',[
            'books'=>$my_books,
            'accepted_books'=>$accepted_books,
            'isAnyoneApplied'=>$isAnyApplication
        ]);
    }
}
