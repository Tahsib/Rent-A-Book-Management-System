<?php

namespace App\Http\Controllers;

use App\Rent;
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
            'status'=>'required',
        ]);

       // $data['user_id'] = auth()->user()->id;
        //$rent = \App\Rent::create($data);
        $rent = auth()->user()->rents()->create($data);

        return redirect('/rents');
    }


    public function show(Rent $rent)
    {
        return view('rent.show',compact('rent'));
    }

    public function cart_show()
    {
        $rents = Rent::all();
        $userId = auth()->user()->id;
        return view('rent.cart',compact('userId','rents'));
    }

    public function rent_confirm(Rent $rent)
    {
        return view ('rent.rent_confirm',compact('rent'));
    }

    public function rent_user(Rent $rent)
    {

        $data = request()->validate([
            'book_name'=>'required',
            'writer'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'rent'=>'required',
            'time'=>'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        $data['rent_id'] = auth()->user()->id;
        $rent->update($data);
        return redirect('/rents');

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
