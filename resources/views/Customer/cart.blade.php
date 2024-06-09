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

            @for($i = 1; $i < 9; $i++)
                <div class="col-md-12">
                    <div id="list-type" class="proerty-th-list">


                    <div class="cart-item">
                        <img src="{{ asset('uploads/ad/ad-default.png') }}" alt="Product Image" class="product-image">
                        <div class="product-details">
                            <h2 class="product-title">Title</h2>
                            <p class="product-category">Category</p>
                        </div>
                        <div class="quantity-controls">
                            <button class="quantity-btn minus-btn">-</button>
                            <input type="number" class="quantity-input" value="1" min="1">
                            <button class="quantity-btn plus-btn">+</button>
                        </div>
                        {{-- <h2 class="product-title">Price: </h2> --}}
                        <h2 class="product-amount">$<span>10.00</span></h2>
                        {{-- <h2 class="product-title">Total Amount: </h2> --}}
                        <h2 class="product-amount">$<span class="amount">10.00</span></h2>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>

                </div>
                    @endfor

                @if(!empty($myAds) && count($myAds) > 0)
                    <div class="card">
                        {{ $myAds->links() }}
                    </div>
                @endif
            </div>


        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const minusBtns = document.querySelectorAll('.minus-btn');
    const plusBtns = document.querySelectorAll('.plus-btn');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const amountElements = document.querySelectorAll('.amount');
    const unitPrice = 10.00; // Example unit price

    minusBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            let quantity = quantityInputs[index].value;
            if (quantity > 1) {
                quantity--;
                quantityInputs[index].value = quantity;
                updateAmount(index, quantity);
            }
        });
    });

    plusBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            let quantity = quantityInputs[index].value;
            quantity++;
            quantityInputs[index].value = quantity;
            updateAmount(index, quantity);
        });
    });

    function updateAmount(index, quantity) {
        let newAmount = (quantity * unitPrice).toFixed(2);
        amountElements[index].textContent = newAmount;
    }
});

</script>

@endsection
