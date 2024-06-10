<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecentlyViewed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentlyViewedControler extends Controller
{
    function index() {
        $myRecentlyViewedItems = RecentlyViewed::where('created_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data'    => $myRecentlyViewedItems,
            'message' => 'My Recenlty Viewed Items',
        ], 200);
    }
}
