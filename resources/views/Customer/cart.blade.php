@extends('frontend_layout')
@section('content')

<style>

    .cart-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        flex-wrap: wrap;
    }

    .product-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 10px;
    }

    .product-details {
        flex-grow: 1;
        max-width: 500px;
        margin-right: 10px;
    }

    .product-title {
        font-size: 16px;
        margin: 0 30px;
    }

    .product-category {
        font-size: 14px;
        color: #888;
        margin: 0 30px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    .quantity-btn {
        background-color: #ddd;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .quantity-input {
        width: 150px;
        text-align: center;
        margin: 0 5px;
        border: 1px solid #ddd;
    }

    .product-amount {
        font-size: 16px;
        margin: 0 15px;
        white-space: nowrap;
    }

    .delete-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-left: 20px;
    }

    #price {
        margin-right: 200px;
    }

    @media (max-width: 768px) {
        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .product-image {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .product-details {
            max-width: 100%;
            margin-right: 0;
        }

        .product-title,
        .product-category {
            margin: 0 0 10px 0;
        }

        .quantity-controls {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .product-amount {
            margin: 0 0 10px 0;
        }

        .delete-btn {
            margin-left: 0;
        }
    }

    </style>


<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">

        <div class="col-md-12  pr0 padding-top-40 properties-page">

            <div class="col-md-12">
                <h3 class="card-title">Cart</h3>
            </div>

            @if(!empty($myCarts))
    @foreach($myCarts as $key => $cart)
        <div class="col-md-12">
            <div id="list-type" class="proerty-th-list">
                <div class="cart-item" data-cart-id="{{ $cart->id }}">
                    <img src="{{ asset($cart->item->itemImage[0]->image) }}" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <h2 class="product-title"><a href="{{ url('product-detail', $cart->item->id) }}">{{ $cart->item->item_title }}</a></h2>
                        <p class="product-category">{{ $cart->item->category->category_name }}</p>
                    </div>
                    <div class="quantity-controls">
                        <input type="hidden" value="{{ csrf_token() }}" id="_token">
                        <input type="hidden" value="{{ $cart->item->buy_it_now_price }}" class="buy_it_now_price">
                        <input type="hidden" value="{{ $cart->id }}" class="cart-id">
                        <button class="quantity-btn cart-quantity-btn minus-btn" data-action="minus">-</button>
                        <input type="number" class="quantity-input" value="{{ $cart->quantity }}" min="1" readonly>
                        <button class="quantity-btn cart-quantity-btn plus-btn" data-action="plus">+</button>
                    </div>
                    <h2 class="product-amount">{{ env('CurrencySymbol') }}<span>{{ $cart->item->buy_it_now_price }}</span></h2>
                    <h2 class="product-amount">{{ env('CurrencySymbol') }}<span class="amount">{{ $cart->item->buy_it_now_price * $cart->quantity }}</span></h2>
                    <button class="delete-btn cart-delete-btn" data-action="remove"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>
    @endforeach
@endif


                @if(!empty($myAds) && count($myAds) > 0)
                    <div class="card">
                        {{ $myAds->links() }}
                    </div>
                @endif
            </div>


        </div>

        <a href="#" class="btn btn-success align-right">Checkout</a>

        </div>
    </div>
</div>

@endsection
