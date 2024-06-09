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
        width: 60px;
        height: 60px;
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

    .product-quantity {
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
                <h3 class="card-title">Purchase History</h3>
            </div>


            <div class="row">
				<div class="col-md-12" style="margin-top: 20px">
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th>Image</th>
					        <th>Title</th>
					        <th>Purchase Quantity</th>
					        <th>Total Price</th>
					        <th>Payment Status</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
            @for($i = 1; $i < 9; $i++)
					      <tr>
					        <td>
                                <img src="{{ asset('uploads/ad/ad-default.png') }}" alt="Product Image" class="product-image">
                            </td>
					        <td>
                                <div class="product-details">
                                    <h2 class="product-title">Title</h2>
                                    <p class="product-category">Category</p>
                                </div>
                            </td>
					        <td>
                                <h2 class="product-quantity"><span>10</span></h2>
                            </td>
					        <td>
                                <h2 class="product-amount">$<span>10.00</span></h2>
                            </td>
					        <td><a href="#" class="btn btn-info">Pay Now</a></td>
					        <td><a href="#" class="btn btn-info">Pay Now</a></td>
					      </tr>
                    @endfor

					    </tbody>
					  </table>
					</div>
				</div>
			</div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
