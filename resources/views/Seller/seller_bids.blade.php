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
            margin: 0;
        }

        .product-category {
            font-size: 14px;
            color: #888;
            margin: 0
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
                        <h3 class="card-title">Item Bids</h3>

                        @if (Session::has('message'))
                            <p class="bg-info p3 mt-3 text-dark-bold">{{ Session::get('message') }}</p>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col-md-12" style="margin-top: 20px">
                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Original Price</th>
                                            <th>Your Price</th>
                                            <th>Offer Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($sellerBids))
                                            @foreach ($sellerBids as $bid)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $bid->item->itemImage[0]->image }}" alt="Product Image"
                                                            class="product-image">
                                                    </td>
                                                    <td>
                                                        <div class="product-details">
                                                            <h2 class="product-title pb-2"><a href="{{ url('product-detail', $bid->item->id) }}">{{ $bid->item->item_title }}</a></h2>
                                                            <p class="product-category">
                                                                {{ $bid->item->category->category_name }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h2 class="product-amount">$<span>{{ $bid->orignal_price }}</span>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <h2 class="product-amount">$<span>{{ $bid->bid_price }}</span></h2>
                                                    </td>
                                                    <td>{{ $bid->bid_status }}</td>
                                                    <td>
                                                        {{-- @if($bid->bid_status == 'pending') --}}
                                                            <a @if(($bid->bid_status != 'pending' && $bid->bid_status != 'rejected') || $bid->bid_status == 'appected_and_paid') class="btn btn-success text-success" disabled="disabled" @else class="btn btn-success"  href="{{ url('bid-accepted',$bid->id) }}" @endif>Accepted</a>


                                                            <a @if(($bid->bid_status != 'pending' && $bid->bid_status != 'accepted') || $bid->bid_status == 'appected_and_paid') class="btn btn-danger text-danger" disabled="disabled" @else class="btn btn-danger"  href="{{ url('bid-rejected',$bid->id) }}" @endif>Rejected</a>

                                                            {{-- <a href="{{ url('bid-rejected',$bid->id) }}" class="btn btn-danger">Rejected</a> --}}
                                                        {{-- @endif --}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif

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
