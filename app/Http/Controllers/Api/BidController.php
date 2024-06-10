<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    function index() {
        $myBidItems = Bid::where('created_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data'    => $myBidItems,
            'message' => 'My Bid who i sent',
        ], 200);
    }
}
