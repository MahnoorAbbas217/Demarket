@extends('frontend_layout')
@section('content')

{{-- <div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-1.jpg') }}" alt="GTA V"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-2.jpg') }}" alt="The Last of us"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-3.jpg') }}" alt="GTA V"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-4.jpg') }}" alt="The Last of us"></div>

        </div>
    </div>
</div> --}}

<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">
            @if (!empty($sliders) && count($sliders) > 0)
                @foreach ($sliders as $key => $slider)
                    <div class="item"><img src="{{ asset($slider->image) }}" alt="GTA V">
                    </div>
                @endforeach
            @else
                <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-4.jpg') }}" alt="The Last of us"></div>
            @endif
        </div>
    </div>
</div>


<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">

            {{-- recommended items --}}
            <div class="col-md-12  pr0 padding-top-40 properties-page">

                <div class="col-md-12 clear">
                    <h3 class="card-title"><b>Recommended Items</b></h3>
                </div>

                <div class="col-md-12 clear">
                    <div id="list-type" class="proerty-th">
                        @if (!empty($recommendedItems))
                            @foreach ($recommendedItems as $item)
                                <div class="col-sm-6 col-md-3 p0 mt-3">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ url('product-detail', $item->id) }}" target="_blank"><img
                                                    src="{{ $item->itemImage[0]->image }}"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="{{ url('product-detail', $item->id) }}"> {{ $item->item_title }}</a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Category :</b>
                                                {{ $item->category->category_name }}
                                            </span>
                                            <span class="proerty-price pull-right">Rs:
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

            </div>
            {{-- end recommended --}}



            {{-- random items --}}
            <div class="col-md-12  pr0 padding-top-40 properties-page">

                <div class="col-md-12 clear">
                    <h3 class="card-title"><b>Random Items</b></h3>
                </div>

                <div class="col-md-12 clear">
                    <div id="list-type" class="proerty-th">
                        @if (!empty($randomItems))
                            @foreach ($randomItems as $item)
                                <div class="col-sm-6 col-md-3 p0 mt-3">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ url('product-detail', $item->id) }}" target="_blank"><img
                                                    src="{{ $item->itemImage[0]->image }}"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="{{ url('product-detail', $item->id) }}"> {{ $item->item_title }}</a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Category :</b>
                                                {{ $item->category->category_name }}
                                            </span>
                                            <span class="proerty-price pull-right">Rs:
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

            </div>
            {{-- end random --}}


            <div class="col-md-12">
                <div class="text-center" style="margin-top: 15px; margin-bottom: 25px;">
                    <a href="{{ url('products') }}" class="btn btn-primary">View All Items</a>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
