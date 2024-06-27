@extends('frontend_layout')
@section('content')


<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row  pr0 padding-top-40 properties-page">


            {{-- advance filter --}}
            <div class="col-md-12 padding-bottom-40 large-search">
                <div class="search-form wow pulse">
                    <form action="{{ URL::to('products') }}" method="get" class=" form-inline">
                        @csrf
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="keyword" placeholder="Key word" @if(isset($_GET['keyword']) && $_GET['keyword'] != '') value="{{ $_GET['keyword'] }}" @endif>
                            </div>
                            <div class="col-md-5">
                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" name="category">
                                    <option value="" selected>Select Category</option>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(isset($_GET['category']) && $_GET['category'] != '' && $_GET['category'] == $category->id) selected @endif>{{ $category->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="search-row">

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="item_type_new" @if(isset($_GET['item_type_new']) && $_GET['item_type_new'] == 'on') checked @endif> New Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="item_type_used" @if(isset($_GET['item_type_used']) && $_GET['item_type_used'] == 'on') checked @endif> Used Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="free_shipping" @if(isset($_GET['free_shipping']) && $_GET['free_shipping'] == 'on') checked @endif> Free Shipping
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="auction_item" @if(isset($_GET['auction_item']) && $_GET['auction_item'] == 'on') checked @endif> Auction Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="verified_seller" @if(isset($_GET['verified_seller']) && $_GET['verified_seller'] == 'on') checked @endif> Verified Seller
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:20px ">
                            <div class="search-row pull-right">
                                <button type="submit" class="btn btn-info">Search</button>
                                <a href="{{ url('products') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- end filter --}}

            {{-- short filter --}}
            <div class="col-md-12  clear">
                <div class="col-xs-10 page-subheader sorting pl0">
                    <ul class="sort-by-list">
                        {{-- <li class="active">
                            <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                Property Date <i class="fa fa-sort-amount-asc"></i>
                            </a>
                        </li> --}}
                        <li class="">
                            <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                Property Price <i class="fa fa-sort-numeric-desc"></i>
                            </a>
                        </li>
                    </ul><!--/ .sort-by-list-->

                    <div class="items-per-page">
                        {{-- <label for="items_per_page"><b>Property per page :</b></label> --}}
                        <div class="sel">
                            <select name="per_page">
                                <option value="3">Low Price To Hight</option>
                                <option value="3">Hight Price To Low</option>
                            </select>
                        </div><!--/ .sel-->
                    </div><!--/ .items-per-page-->
                </div>

                <div class="col-xs-2 layout-switcher">
                    <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                    <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                </div><!--/ .layout-switcher-->
            </div>


            {{-- items list --}}
            <div class="col-md-12 clear">
                <div id="list-type" class="proerty-th">
                    @if (!empty($items))
                        @foreach ($items as $item)
                            <div class="col-sm-6 col-md-3 p0 mt-3">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="{{ url('product-detail', $item->id) }}"><img
                                                src="{{ $item->itemImage[0]->image }}"></a>
                                    </div>

                                    <div class="item-entry overflow">
                                        <h5><a href="{{ url('product-detail', $item->id) }}"> {{ $item->item_title }}</a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Category :</b>
                                            {{ $item->category->category_name }}
                                        </span>
                                        <span class="proerty-price pull-right">{{ env('CurrencySymbol') }}:
                                            {{ $item->buy_it_now_price }}</span>
                                        <div class="property-icon"
                                            style="height: 60px !important;overflow: hidden;">
                                            <span class="pull-left">
                                            <small style="margin-left: 5px;">Type: {{ $item->sale_type == 'buy_it_now' ? 'Fixed Price' : 'Bidding' }}</small></span>

                                            <span class="pull-right">Condication:
                                                {{ $item->condition == 'new' ? 'New' : 'Used' }}</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- end items list --}}


            {{-- start pagination --}}
            <div class="col-md-12 clear">
                <div class="pull-right">
                    @if(!empty($items) && count($items) > 0)
                        <div class="card">
                            {{ $items->links() }}
                        </div>
                    @endif
                </div>
            </div>
            {{-- end pagination --}}


        </div>
    </div>
</div>


@endsection
