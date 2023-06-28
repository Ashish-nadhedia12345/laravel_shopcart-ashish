<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index(){
        $address = Address::all();
        return view('address.index',['address' => $address]);
    }

    public function create(){
        return view('address.create');
    }

    public function store(Request $request){
        $validate = $request->validate([            
            'address_line1'=>'required',
            'address_line2'=>'required',
            'city'=>'required',
            'pincode'=>'required|integer',
            'state'=>'required',
            'country'=>'required'
        ]);
        $user = auth()->user()->id;
        $add = new Address();
        $add->user_id = $user;
        $add->address_line1 = $request->input('address_line1');
        $add->address_line2 = $request->input('address_line2');
        $add->city = $request->input('city');
        $add->pincode = $request->input('pincode');
        $add->state = $request->input('state');
        $add->country = $request->input('country');
        $add->save();
        return redirect()->route('address.index')->with('success');
    }
    public function destroy(Address $address){
       $address->delete();
       return redirect()->route('address.index')->with('success');
    }
}
