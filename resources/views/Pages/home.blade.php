@extends('frontend_layout')
@section('content')

<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-1.jpg') }}" alt="GTA V"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-2.jpg') }}" alt="The Last of us"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-3.jpg') }}" alt="GTA V"></div>
            <div class="item"><img src="{{ asset('Frontend/assets/img/slide1/slider-image-4.jpg') }}" alt="The Last of us"></div>

        </div>
    </div>
    {{-- <div class="slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>The Pakistan's Number 1 Buy/Sell Site</h2>
                <div class="search-form wow pulse" data-wow-delay="0.8s">

                    <form action="{{ URL::to('ads') }}" method="get" class=" form-inline">


                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Key word">
                        </div>
                        <div class="form-group">
                            <select id="lunchBegins" class="selectpicker" name="city" data-live-search="true" data-live-search-style="begins" title="Select Category">

                                @if(!empty($cities))
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                    @endforeach
                                @endif
                                    </select>
                        </div>
                        <div class="form-group">
                            <select id="basic" name="property_type" class="selectpicker show-tick form-control">
                                        <option value=""> - Condition - </option>
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                    </select>
                        </div>
                        <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>

                        <div style="display: none;" class="search-toggle">

                            <div class="search-row">

                                <div class="form-group mar-r-20">
                                    <label for="price-range">Price range (Rs):</label>
                                    <input type="text" name="price_range" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[0,450]" id="price-range"><br />
                                    <b class="pull-left color">1000 Rs</b>
                                    <b class="pull-right color">100000 Rs</b>
                                </div>

                                <!-- End of  -->
                            </div>
                            <br>
                            <div class="search-row">

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Fire Place(3100)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Dual Sinks(500)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Hurricane Shutters(99)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>

                            <div class="search-row">

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox" name="swimming"> Swimming Pool(1190)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> 2 Stories(4600)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Emergency Exit(200)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>

                            <div class="search-row">

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Laundry Room(10073)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> Jog Path(1503)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                                    <input type="checkbox"> 26' Ceilings(1200)
                                                </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                                <br>
                                <hr>
                            </div>
                            <button class="btn search-btn prop-btm-sheaerch" type="submit"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">

        <div class="col-md-12  pr0 padding-top-40 properties-page">

            <div class="col-md-12 clear">
                <h3 class="card-title">Recommended Items</h3>
            </div>

            <div class="col-md-12 clear">
                <div id="list-type" class="proerty-th">
                    @for($i = 1; $i < 9; $i++)

                        @if($i == 6)
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item proerty-item-ads">
                                <a href="#" ><img src="{{ asset('Frontend/assets/img/pro-ads.jpg') }}"></a>
                            </div>
                        </div>
                        @else

                        <div class="col-sm-6 col-md-3 p0 mt-3">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" target="_blank"><img src="{{ asset('uploads/ad/ad-default.png') }}"></a>
                                </div>

                                <div class="item-entry overflow">
                                    <h5><a href="#"> Title</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Category :</b> Cateogory Name </span>
                                    <span class="proerty-price pull-right">Rs: 230</span>
                                    <div class="property-icon" style="height: 60px !important;overflow: hidden;">
                                        <span class="pull-left"><i class="pe-7s-map-marker strong"></i></span>
                                        <small style="margin-left: 5px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</small>
                                    </div>
                                </div>


                            </div>
                        </div>
                        @endif
                    @endfor
                </div>

                @if(!empty($myAds) && count($myAds) > 0)
                    <div class="card">
                        {{ $myAds->links() }}
                    </div>
                @endif
            </div>






            <div class="col-md-12  pr0 padding-top-40 properties-page">

                <div class="col-md-12 clear">
                    <h3 class="card-title">Recently Items</h3>
                </div>
    
                <div class="col-md-12 clear">
                    <div id="list-type" class="proerty-th">
                        @for($i = 1; $i < 5; $i++)
    
                            <div class="col-sm-6 col-md-3 p0 mt-3">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="#" target="_blank"><img src="{{ asset('uploads/ad/ad-default.png') }}"></a>
                                    </div>
    
                                    <div class="item-entry overflow">
                                        <h5><a href="#"> Title</a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Category :</b> Cateogory Name </span>
                                        <span class="proerty-price pull-right">Rs: 230</span>
                                        <div class="property-icon" style="height: 60px !important;overflow: hidden;">
                                            <span class="pull-left"><i class="pe-7s-map-marker strong"></i></span>
                                            <small style="margin-left: 5px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</small>
                                        </div>
                                    </div>
    
    
                                </div>
                            </div>

                        @endfor
                    </div>
                </div>
    
                    @if(!empty($myAds) && count($myAds) > 0)
                        <div class="card">
                            {{ $myAds->links() }}
                        </div>
                    @endif
                </div>




                <div class="col-md-12  pr0 padding-top-40 properties-page">

                    <div class="col-md-12 clear">
                        <h3 class="card-title">Random Items</h3>
                    </div>
        
                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">
                            @for($i = 1; $i < 5; $i++)
        
                                <div class="col-sm-6 col-md-3 p0 mt-3">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="#" target="_blank"><img src="{{ asset('uploads/ad/ad-default.png') }}"></a>
                                        </div>
        
                                        <div class="item-entry overflow">
                                            <h5><a href="#"> Title</a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Category :</b> Cateogory Name </span>
                                            <span class="proerty-price pull-right">Rs: 230</span>
                                            <div class="property-icon" style="height: 60px !important;overflow: hidden;">
                                                <span class="pull-left"><i class="pe-7s-map-marker strong"></i></span>
                                                <small style="margin-left: 5px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</small>
                                            </div>
                                        </div>
        
        
                                    </div>
                                </div>
    
                            @endfor
                        </div>
        
                        @if(!empty($myAds) && count($myAds) > 0)
                            <div class="card">
                                {{ $myAds->links() }}
                            </div>
                        @endif
                    </div>



            <div class="col-md-12">
                <div class="text-center" style="margin-top: 15px; margin-bottom: 25px;">
                    <a href="#" class="btn btn-primary">View All Items</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection
