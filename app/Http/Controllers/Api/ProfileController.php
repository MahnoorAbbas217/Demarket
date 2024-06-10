<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function myProfile() {
        return response()->json([
            'success' => true,
            'data'    => Auth::user(),
            'message' =>'My Profile Data',
        ], 200);
    }

    function updateMyProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required','regex:/^92\d{10}$/','unique:users'],
            'city_name' => ['required'],
            ],
            [
                'mobile_no.required' => 'The mobile number is required.',
                'mobile_no.regex' => 'The mobile number must start with 92 and be 12 digits long.',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'data'    => $validator->errors(),
                'message' =>'Validation Error',
            ], 201);
        }

        $user = User::find(Auth::user()->id);
        $user = $request->name;
        $user = $request->mobile_no;
        $user = Auth::user()->mobile_no != $request->mobile_no ? '' : Auth::user()->mobile_no_verified_at;
        $user = $request->city_name;

        $user->update();

        return response()->json([
            'success' => true,
            'data'    => $user,
            'message' => 'User Updated Successfully!',
        ], 201);
    }

    function changePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'data'    => $validator->errors(),
                'message' =>'Validation Error',
            ], 201);
        }

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'success' => false,
                'data'    => ['old_password' => ['The old password is incorrect.']],
                'message' => 'The given data was invalid.',
            ], 422);
        }

        $user->password = Hash::make($request->password);
        $user->update();

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Password changed successfully.',
        ], 200);
    }
}
