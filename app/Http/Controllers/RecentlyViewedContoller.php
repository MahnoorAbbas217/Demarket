<?php

namespace App\Http\Controllers;

use App\Models\RecentlyViewed;
use Illuminate\Http\Request;

class RecentlyViewedContoller extends Controller
{
    public function index(){
        $recentlyVieweds = RecentlyViewed::WithActiveItem()->with('item')
          ->orderBy('created_at', 'DESC')
          ->paginate(20);

        return view('Customer.recently_viewed', compact('recentlyVieweds'));
    }
}
