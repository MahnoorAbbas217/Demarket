<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileContoller extends Controller
{

    // profile
    public function profile(){
        return view('Profile.profile');
    }

    public function updateProfile($id, Request $request){

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


    // change password

    function changePassword(){
        return view('Profile.change_password');
    }
    function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = User::find(loginUserId());

        if (!Hash::check($request->current_password, $user->password)) {
            Session::flash('message', 'Current password does not match');
            return redirect()->back();
        }

        $user->password = Hash::make($request->new_password);
        $user->update();

        Session::flash('message', 'Password changed successfully');
        return redirect()->back();
    }


    // identity verification
    

    function identityVerification(){
        return view('Profile.identity_verification');
    }

    function storeIdentityVerification(Request $request){

        $request->validate([
            'date_of_birth' => 'required',
        ]);

        $user = User::find(loginUserId());

        if($request->hasFile('cnic_front_copy')){
            $cnic_front_copy = time().'-'.loginUserId().'-user-cnic-front.'.$request->cnic_front_copy->extension();
    
            $request->cnic_front_copy->move(public_path('uploads/userverification/'), $cnic_front_copy);

            $user->cnic_front_copy = 'uploads/userverification/'.$cnic_front_copy;
        }

        if($request->hasFile('cnic_back_copy')){
            $cnic_back_copy = time().'-'.loginUserId().'-user-cnic-back.'.$request->cnic_back_copy->extension();
    
            $request->cnic_back_copy->move(public_path('uploads/userverification/'), $cnic_back_copy);

            $user->cnic_back_copy = 'uploads/userverification/'.$cnic_back_copy;
        }

        $user->date_of_birth = $request->date_of_birth;
        $user->identity_verification_status = 'pending';

        $user->update();

        Session::flash('message', 'Identity Submit For Verification!');
        return redirect()->back();
    }
}
