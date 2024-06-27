<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    function myCart() {
        $myCarts = Cart::where('created_by', loginUserId())->WithActiveItem()->get();

        return view('Customer.cart', compact('myCarts'));
    }

    function addToCart(Request $request) {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $checkItem = Cart::where('created_by', loginUserId())->where('item_id', $request->item_id)->first();

        $quantity = 1;
        if(!empty($checkItem)){
            $quantity = $checkItem->quantity + 1;

            $checkItem->quantity = $quantity;
            $checkItem->update();

            return response()->json([
                'status', 200,
                'message', 'Item Quanity Updated Successfully!',
            ]);
        }

        Cart::create([
            'created_by' => loginUserId(),
            'item_id' => $request->item_id,
            'quantity' => $quantity,
        ]);

        return response()->json([
            'status', 200,
            'message', 'Item Added To Cart Successfully!',
        ]);

    }

    function removeItemFromCart($cart_id) {
        $checkCart = Cart::where('created_by', loginUserId())->where('id', $cart_id)->first();

        if(!empty($checkCart)){
            $checkCart->delete();

            return response()->json([
                'status', 200,
                'message', 'Item Removed From Cart Successfully!',
            ]);
        }

        return response()->json([
            'status', 201,
            'message', 'Cart User not Valid!',
        ]);
    }

    function updateCartQuantity(Request $request, $cart_id, $action) {
        $checkCart = Cart::where('created_by', loginUserId())->where('id', $cart_id)->first();

        if(!empty($checkCart)){
            $checkCart->quantity = $request->quantity;
            $checkCart->update();

            return response()->json([
                'status', 200,
                'message', 'Item Quantity Updated Successfully!',
            ]);
        }

        return response()->json([
            'status', 201,
            'message', 'Cart User not Valid!',
        ]);
    }
}
