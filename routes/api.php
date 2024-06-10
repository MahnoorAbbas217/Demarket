<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BidController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\MembershipController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RecentlyViewedControler;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SavedItemControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group( function () {
    Route::get('memberships', [MembershipController::class, 'index']);
    Route::get('membership/{membership_id}', [MembershipController::class, 'show']);

    Route::get('cities', [CityController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category/{id}', [CategoryController::class, 'show']);
    
    Route::get('sub-categories', [SubCategoryController::class, 'index']);

    Route::get('items', [ItemController::class, 'index']);
    Route::get('item/{item_id}', [ItemController::class, 'show']);
    Route::get('my-items', [ItemController::class, 'myItems']);
    Route::get('my-sold-items', [ItemController::class, 'mySoldItems']);
    Route::get('my-unsold-items', [ItemController::class, 'myUnsoldItems']);

    Route::get('my-profile', [ProfileController::class, 'myProfile']);
    Route::post('update-my-profile', [ProfileController::class, 'updateMyProfile']);
    Route::post('change-password', [ProfileController::class, 'changePassword']);

    Route::get('my-saved-items', [SavedItemControler::class, 'index']);
    Route::get('my-recently-viewed-items', [RecentlyViewedControler::class, 'index']);
    Route::get('my-bids', [BidController::class, 'index']);

    Route::get('carts', [CartController::class, 'index']);


    // Route::get('items-by-category/{category_id}', [CategoryController::class, 'show']);
});

// 'headers' => [
//     'Accept' => 'application/json',
//     'Authorization' => 'Bearer '.$accessToken,
// ]
