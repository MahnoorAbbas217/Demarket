<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function storeProfile($store_slug) {
        $store = User::where('store_slug', $store_slug)->first();

        $storeProducts = Item::where('created_by', $store->id)->withActiveCategory()->withActiveSubCategory()->ActivePublication()->with('itemImage')->orderBy('created_at', 'DESC')->get();

        return view('Pages.store', compact('store', 'storeProducts'));
    }
}
