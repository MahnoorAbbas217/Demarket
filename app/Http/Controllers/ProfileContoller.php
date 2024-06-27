<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileContoller extends Controller
{
    public function index(){
        return view('Profile.profile');
    }

    public function update($id, Request $request){

        $request->validate([
            'name' => 'required',
            // 'mobile_no' =>  ['required', 'regex:/92\d{10}$/'],
            'city_name' => 'required',
            'shipping_address' => 'required',
            'permanent_address' => 'required'
        ]);

        User::find($id)->update([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            'city_name' => $request->city_name,
            'shipping_address' => $request->shipping_address,
            'personal_address' => $request->permanent_address,
        ]);

        Session::flash('message','Profile Updated Successfully!');

        return redirect ('profile');
    }
}
