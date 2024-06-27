@extends('frontend_layout')
@section('content')

    <!-- property area -->
    <div class="properties-area recent-property" style="background-color: #FFF;">
        <div class="container">
            <div class="row">

                <div class="col-md-12  pr0 padding-top-40 properties-page">

                    <div class="col-md-12 clear">
                        <h3 class="card-title">Recently Viewed Items</h3>
                    </div>
                    {{-- @if (Session::has('message'))
                        <p class="bg-info p3 mt-3 text-dark-bold">{{ Session::get('message') }}</p>
                    @endif --}}
                    <div class="col-md-12 clear mb-5">
                        <div id="list-type" class="proerty-th">
                            @if (!empty($recentlyVieweds))
                                @foreach ($recentlyVieweds as $item)
                                    <div class="col-sm-6 col-md-3 p0 mt-3">
                                        <div class="box-two proerty-item">
                                            <div class="item-thumb">
                                                <a href="{{ url('product-detail', $item->item->id) }}">
                                                    <img
                                                        src="{{ $item->item->itemImage[0]->image }}">
                                                    </a>
                                            </div>
        
                                            <div class="item-entry overflow">
                                                <h5><a href="{{ url('product-detail', $item->id) }}"> {{ $item->item->item_title }}</a></h5>
                                                <div class="dot-hr"></div>
                                                <span class="pull-left"><b> Category :</b>
                                                    {{ $item->item->category->category_name }}
                                                </span>
                                                <span class="proerty-price pull-right">{{ env('CurrencySymbol') }}:
                                                    {{ $item->item->buy_it_now_price }}</span>
                                                <div class="property-icon"
                                                    style="height: 60px !important;overflow: hidden;">
                                                    <span class="pull-left">
                                                    <small style="margin-left: 5px;">Type: {{ $item->item->sale_type == 'buy_it_now' ? 'Fixed Price' : 'Bidding' }}</small></span>
        
                                                    <span class="pull-right">Condication:
                                                        {{ $item->item->condition == 'new' ? 'New' : 'Used' }}</span>
                                                </div>
                                            </div>
        
        
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        @if (!empty($myAds) && count($myAds) > 0)
                            <div class="card">
                                {{ $myAds->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
