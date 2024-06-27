<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
}
