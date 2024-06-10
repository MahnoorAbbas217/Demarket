<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SavedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedItemControler extends Controller
{
    function index() {
        $mySavedItems = SavedItem::where('created_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data'    => $mySavedItems,
            'message' => 'My Saved Items',
        ], 200);
    }
}
