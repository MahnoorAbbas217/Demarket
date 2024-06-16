<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    function index() {
        $recommendedItemsQuery = Item::ActivePublication()->orderBy('created_at', 'DESC')->with(['itemImage', 'category', 'subCategory'])->withActiveCategory()->withActiveSubCategory()->WithActiveUser();

        $randomItemsQuery = $recommendedItemsQuery;
        $recommendedItems = $recommendedItemsQuery->paginate(15);
        $randomItems = $randomItemsQuery->inRandomOrder()->paginate(8);

        return view('Pages.home', compact('recommendedItems', 'randomItems'));
    }

    function items(Request $request) {
        $items = Item::ActivePublication()->orderBy('created_at', 'DESC');

        if(isset($request->keyword) && $request->keyword != ''){
            $items->where('item_title', 'like', '%'.$request->keyword.'%');
        }

        if(isset($request->category) && $request->category != ''){
            $items->where('category_id', $request->category);
        }

        if(isset($request->item_type_new) && $request->item_type_new != ''){
            $items->where('condition', $request->item_type_new);
        }

        if(isset($request->item_type_used) && $request->item_type_used != ''){
            $items->where('condition', $request->item_type_used);
        }

        if(isset($request->free_shipping) && $request->free_shipping != ''){
            $items->where('shipping_price', 0);
        }

        if(isset($request->auction_item) && $request->auction_item != ''){
            $items->where('sale_type', 0);
        }

        if(isset($request->verified_seller) && $request->verified_seller != ''){
            $items->WithVerifiedUser();
        }


        $items = $items->with(['itemImage', 'category', 'subCategory'])->withActiveCategory()->withActiveSubCategory()->WithActiveUser()->paginate(50);

        $categories = Category::ActivePublication()->get();

        return view('Pages.products', compact('items', 'categories'));
    }

    function itemDetail($item_id) {
        $itemDetail = Item::ActivePublication()->where('id', $item_id)->with(['itemImage', 'category', 'subCategory', 'itemAdditionalInformation', 'user'])->withActiveCategory()->withActiveSubCategory()->WithActiveUser()->first();

        return view('Pages.product_detail', compact('itemDetail'));
    }
}
