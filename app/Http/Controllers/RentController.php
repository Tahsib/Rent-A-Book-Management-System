<?php

namespace App\Http\Controllers;

use App\Rent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        if(request()->hasFile('image')){
            $data['image'] = request()->image;
        }

        // $data['user_id'] = auth()->user()->id;
        //$rent = \App\Rent::create($data);
        $rent = auth()->user()->rents()->create($data);
        $this->storeImage($rent);

        return redirect('/rents');
    }


    public function show(Rent $rent)
    {
        $userId = auth()->user()->id;
        return view('rent.show',compact('rent','userId'));
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
        if(request()->hasFile('image')){
            $data['image'] = request()->image;
        }

        $data['rent_id'] = auth()->user()->id;
        $rent->update($data);
        $this->storeImage($rent);
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

    public function storeImage($rent)
    {
        if(request()->hasFile('image')){
            $rent->update([
                'image'=> request()->image->store('uploads','public'),
            ]);
        }
        $image = Image::make(public_path('storage/'.$rent->image))->fit(200,300);
        $image->save();

    }
}
