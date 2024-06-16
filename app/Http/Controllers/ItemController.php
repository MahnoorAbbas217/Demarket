<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemAddtionalInformation;
use App\Models\ItemImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    function create(){
        $categories = Category::select('id','category_name')->where('publication_status', 'active')->get();
        $subCategories = SubCategory::select('id','sub_category_name')->where('publication_status', 'active')->get();

        return view('Pages.sell_an_item', compact('categories', 'subCategories'));
    }

    function store(Request $request){
        // echo "<pre>";
        // print_r($request->all());

        DB::beginTransaction();

        $createdBy = Auth::user()->id;

        try {

                $createItem = Item::create([
                    'created_by' => $createdBy,
                    'item_title' => $request->item_title,
                    'condition' => $request->item_condition,
                    'category_id' => $request->item_category,
                    'sub_category_id' => $request->item_sub_category,
                    'sale_type' => $request->item_sale_type,
                    'condition_description' => $request->condition_description,
                    'quantity' => $request->quantity,
                    'start_bidding_price' => $request->start_bid_price,
                    'buy_it_now_price' => $request->buy_it_now_price,
                    'auction_duration' => $request->auction_duration,
                    'shipping_price' => $request->shipping_price,
                    'shipping_duration' => $request->shipping_duration,
                    // 'title' => $request->item_additional_information_title,
                    // 'value' => $request->item_additional_information_value,
                    // 'image' => $request->item_image,
                    'short_description' => $request->item_short_description,
                    'video_url' => $request->item_video_url
                ]);

                // echo "item success";

                foreach($request->item_additional_information_title as $key => $additional_information_title){
                    ItemAddtionalInformation::create([
                        'created_by' => $createdBy,
                        'item_id' => $createItem->id,
                        'title' => $additional_information_title,
                        'value' => $request->item_additional_information_value[$key]
                    ]);
                }

                // echo 'addtional succes';


                foreach($request->item_image as $key => $image){

                    $imageName = time().'-item.'.$image->extension();

                    $imagePath = $image->move(public_path('uploads/item/'), $imageName);

                    ItemImage::create([
                        'created_by' => $createdBy,
                        'item_id' => $createItem->id,
                        'image' => 'uploads/item/'.$imageName,
                    ]);
                }

                // echo 'image success';

            DB::commit();

            // return "success";
            Session::flash('message', 'Your Item Submitted Successfully!');
            return redirect('my-items');
        } catch (\Exception $e) {
            DB::rollback();

            // return $e;
            Session::flash('message', 'Your Item Failed To Submit!');
            return redirect('my-items');
        }
    }

    public function myItems(){
        $createdBy = Auth::user()->id;

        $myItems = Item::select('id','category_id','item_title', 'buy_it_now_price', 'sale_type', 'condition')
        ->where('created_by', $createdBy)
        ->with(['category','itemImage'])
        ->orderBy('created_at', 'DESC')
        ->paginate(20);

        return view('Seller.my_items', compact('myItems'));
    }

    function deleteMyItem($item_id) {
        $deleteItem = Item::where('created_by', Auth::user()->id)->where('id', $item_id)->first();

        Session::flash('message', 'Item Not found!');
        if(!empty($deleteItem)){
            $deleteItem->delete();

            Session::flash('message', 'Item Deleted Successfully!');
        }

       return redirect('my-items');
    }
}
