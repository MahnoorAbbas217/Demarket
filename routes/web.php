<?php

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Pages.home');
// });
Route::get('/', [App\Http\Controllers\HomeViewController::class, 'index']);
Route::get('products', [App\Http\Controllers\HomeViewController::class, 'items']);
Route::get('product-detail/{item_id}', [App\Http\Controllers\HomeViewController::class, 'itemDetail']);

// Route::get('products', function () {
//     return view('Pages.products');
// });

Route::get('product-detail', function () {
    return view('Pages.product_detail');
});



Route::get('store', function () {
    return view('Pages.store');
});

Route::middleware('auth')->group(function(){

    // sell item
    Route::get('sell-item', [App\Http\Controllers\ItemController::class, 'create']);
    Route::post('store-sell-item', [App\Http\Controllers\ItemController::class, 'store']);
    Route::get('my-items', [App\Http\Controllers\ItemController::class, 'myItems']);
    Route::get('delete-my-item/{item_id}', [App\Http\Controllers\ItemController::class, 'deleteMyItem']);


    // selling
    // Route::get('my-items', function () {
    //     return view('Seller.my_items');
    // });

    // customer
    Route::get('recently-viewed', function () {
        return view('Customer.recently_viewed');
    });

    Route::get('saved-items', function () {
        return view('Customer.saved_items');
    });

    Route::get('cart', function () {
        return view('Customer.cart');
    });


    Route::get('bids', function () {
        return view('Customer.bids');
    });

    Route::get('purchase-history', function () {
        return view('Customer.purchase_history');
    });


    Route::get('profile', function () {
        return view('Profile.profile');
    });

    Route::get('identity-verification', function () {
        return view('Profile.identity_verification');
    });

    Route::get('messages', function () {
        return view('Profile.messages');
    });

    Route::get('setting', function () {
        return view('Profile.setting');
    });

    Route::get('membership', function () {
        $memberships = Membership::all();

        return view('Profile.membership', compact('memberships'));
    });

    Route::get('change-password', function () {
        return view('Profile.change_password');
    });

    Route::get('logout', function () {
        Auth::logout();

        return redirect('login');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
