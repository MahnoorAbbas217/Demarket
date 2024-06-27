<?php

namespace App\Http\Controllers;

use App\Models\SavedItem;
use Illuminate\Http\Request;

class SavedItemControler extends Controller
{
    public function mySavedItems(){

        $savedItems = SavedItem::WithActiveItem()->with('item')
          ->orderBy('created_at', 'DESC')
          ->paginate(20);


        return view('Customer.saved_items', compact('savedItems'));
    }
}
