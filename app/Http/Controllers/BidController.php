<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BidController extends Controller
{

    function myBids() {
        $bids = Bid::where('created_by', loginUserId())->withActiveItem()->orderBy('created_at', 'DESC')->with('item')->paginate(20);

        return view('Customer.bids',compact('bids'));
    }

    function addBid(Request $request) {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'bid_amount' => 'required',
        ]);

        $checkBid = Bid::where("created_by", loginUserId())->where('item_id', $request->item_id)->where('bid_status', 'pending')->first();

        if(!empty($checkBid)){
            return response()->json([
                'status', 201,
                'message', 'You sent Offer Already!',
            ]);
        }

        $getItemDetail = Item::where('id', $request->item_id)->first();

        if($getItemDetail->start_bidding_price > $request->bid_amount){
            return response()->json([
                'status', 202,
                'message', 'Increase Bid Price!',
            ]);
        }

        Bid::create([
            "created_by" => loginUserId(),
            "item_id" => $request->item_id,
            "item_detail" => $getItemDetail,
            "orignal_price" => $getItemDetail->buy_it_now_price,
            "bid_price" => $request->bid_amount,
        ]);

        return response()->json([
            'status', 200,
            'message', 'Your Offer Sent Successfully!',
        ]);
    }

    function sellerBids(){
        $sellerBids = Bid::withActiveItem()->withItemCreatedBySeller()->orderBy('created_at', 'DESC')->with('item')->paginate(20);

        return view('Seller.seller_bids',compact('sellerBids'));
    }

    function sellerBidAccepted($bid_id) {
        $bid = Bid::withActiveItem()->withItemCreatedBySeller()->where('id', $bid_id)->whereNot('bid_status', 'appected_and_paid')->first();

        Session::flash('message', 'Something Wrong!');
        if(!empty($bid)){
            $bid->bid_status = 'accepted';
            $bid->update();

            Session::flash('message', 'Bid Accepted & Notification sent to Buyer Successfully!');
        }

        return redirect()->back();
    }

    function sellerBidRejected($bid_id) {
        $bid = Bid::withActiveItem()->withItemCreatedBySeller()->where('id', $bid_id)->whereNot('bid_status', 'appected_and_paid')->first();

        Session::flash('message', 'Something Wrong!');
        if(!empty($bid)){
            $bid->bid_status = 'rejected';
            $bid->update();

            Session::flash('message', 'Bid Accepted & Notification sent to Buyer Successfully!');
        }

        return redirect()->back();
    }
}
