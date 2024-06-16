<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    function index() {
        $getItems = Item::select('id', 'created_by', 'item_title','category_id', 'sub_category_id', 'condition', 'sale_type', 'auction_duration', 'buy_it_now_price', 'start_bidding_price', 'quantity', 'shipping_price')->orderBy('created_at', 'DESC')->withActiveCategory()->withActiveSubCategory()->withActiveUser()
        ->with(['category', 'subCategory', 'user', 'itemImage']);


        $items = $getItems->paginate(20);
        $randomItems = $getItems->inRandomOrder()->paginate(10);

        $data['items'] = $items;
        $data['randomItems'] = $randomItems;

        return response()->json([
            'success' => true,
            'data'    => $randomItems,
            'message' => 'Items 20 Items & 10 random Items order by desc',
        ], 200);
    }

    function show($item_id) {
        $item = Item::where('id', $item_id)->with(['category', 'subCategory', 'user', 'itemImage'])->first();

        return response()->json([
            'success' => true,
            'data'    => $item,
            'message' => 'specific item detail with category, subcategory, user, itemimages, item additionalInformation',
        ], 200);
    }

    function myItems() {
        $items = Item::where('created_by', Auth::user()->id);
        $ids = Item::where('created_by', Auth::user()->id)->pluck('id')->take(3)->toArray();
        
        $message = "my items";

        if(isset($_GET['type']) && $_GET['type'] == 'sold'){
            $items = $items->whereIn('id', $ids);

            $message = 'my sold items';
        }

        if(isset($_GET['type']) && $_GET['type'] == 'unsold'){
            $items = $items->whereNotIn('id', $ids);

            $message = 'my unsold items';
        }
        
        $items = $items->with(['category', 'subCategory', 'user', 'itemImage'])->get();

        return response()->json([
            'success' => true,
            'data'    => $items,
            'message' => $message. ' with category, subcategory, user',
        ], 200);
    }

    
}
