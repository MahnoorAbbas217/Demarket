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


Route::get('store/{store_slug}', [App\Http\Controllers\StoreController::class, 'storeProfile']);

Route::get('test', function () {
    return view('welcome');
});

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


    // customer

    Route::get('recently-viewed', [App\Http\Controllers\RecentlyViewedContoller::class, 'index']);


    Route::get('saved-items',  [App\Http\Controllers\SavedItemControler::class, 'mySavedItems']);


    Route::get('cart', [App\Http\Controllers\CartController::class, 'myCart']);
    Route::post('add-to-cart/{item_id}', [App\Http\Controllers\CartController::class, 'addToCart']);
    Route::post('remove-item-from-cart/{cart_id}', [App\Http\Controllers\CartController::class, 'removeItemFromCart']);
    Route::post('update-cart-quantity/{cart_id}/{action}', [App\Http\Controllers\CartController::class, 'updateCartQuantity']);


    Route::get('bids', [App\Http\Controllers\BidController::class, 'sellerBids']);
    Route::get('bid-accepted/{bid_id}', [App\Http\Controllers\BidController::class, 'sellerBidAccepted']);
    Route::get('bid-rejected/{bid_id}', [App\Http\Controllers\BidController::class, 'sellerBidRejected']);
    Route::get('buyer-bids', [App\Http\Controllers\BidController::class, 'myBids']);
    Route::post('add-bid/{item_id}', [App\Http\Controllers\BidController::class, 'addBid']);

    Route::get('purchase-history', function () {
        return view('Customer.purchase_history');
    });


    // profile
    Route::get('profile',  [App\Http\Controllers\ProfileContoller::class, 'profile']);
    Route::post('update-profile/{id}',  [App\Http\Controllers\ProfileContoller::class, 'updateProfile']);


    // identity verification
    Route::get('identity-verification',  [App\Http\Controllers\ProfileContoller::class, 'identityVerification']);
    Route::post('identity-verification',  [App\Http\Controllers\ProfileContoller::class, 'storeIdentityVerification']);

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

    // change password
    Route::get('change-password',  [App\Http\Controllers\ProfileContoller::class, 'changePassword']);
    Route::post('update-password',  [App\Http\Controllers\ProfileContoller::class, 'updatePassword']);

    Route::get('logout', function () {
        Auth::logout();

        return redirect('login');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
