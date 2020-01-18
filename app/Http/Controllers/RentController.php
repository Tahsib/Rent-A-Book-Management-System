<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rents = \App\Rent::all();
        return view('rent.rents',compact('rents'));
    }


    public function create()
    {
        return view('rent.create');
    }


    public function store()
    {
        $data = request()->validate([
            'book_name'=>'required',
            'writer'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'rent'=>'required',
            'time'=>'required',
        ]);

        $data['user_id'] = auth()->user()->id;
        $rent = \App\Rent::create($data);

        return redirect('/rents');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
