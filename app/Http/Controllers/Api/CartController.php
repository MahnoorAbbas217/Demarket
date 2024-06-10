<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index() {
        $myCartItems = Cart::where('created_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data'    => $myCartItems,
            'message' => 'My Cart Items',
        ], 200);
    }
}
