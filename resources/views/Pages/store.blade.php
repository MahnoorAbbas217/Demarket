@extends('frontend_layout')
@section('content')

<style>
    @media (max-width: 767px) {
        .dealer-name-desktop {
            margin-left: 0 !important;
        }
        .dealer-social-media-desktop {
            margin-top: 0 !important;
            margin-left: 0 !important;
        }
        .dealer-social-media-desktop .row {
            margin-top: 10px !important;
        }
        .button-wrapper {
            display: flex;
            justify-content: space-around;
        }
        .btn-container {
            margin-top: 30px !important;
        }
    }
    @media (min-width: 768px) {
        .dealer-name-desktop {
            margin-left: -80px !important;
        }
        .dealer-social-media-desktop {
            margin-top: -20px !important;
            margin-left: -80px !important;
        }
        .dealer-social-media-desktop .row {
            margin-top: 30px !important;
        }
        .button-wrapper .btn-container {
            display: block;
        }


    }
    </style>
<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row  pr0 padding-top-40 properties-page">

            <div class="col-md-12 p0">
                <aside class="sidebar sidebar-property blog-asside-right">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">
                                <div class="clear">
                                    <div class="col-xs-4 col-sm-2 dealer-face">
                                        <a href="">
                                            <img src="{{ asset('Frontend/assets/img/client-face1.png') }}" class="img-circle">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8">
                                        <h3 class="dealer-name dealer-name-desktop">
                                            <a href="#">{{ $store->name }}</a>
                                            <p><i class="fa fa-star text-warning"></i> (3.9)</p>
                                        </h3>
                                        <div class="dealer-social-media dealer-social-media-desktop">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-1">
                                                    <i class="pe-7s-mail strong" style="font-size: 28px"> </i>Verified
                                                </div>
                                                <div class="col-xs-4 col-sm-1">
                                                    <i class="pe-7s-call strong" style="font-size: 30px"> </i>Verified
                                                </div>
                                                <div class="col-xs-4 col-sm-1">
                                                    <i class="pe-7s-user strong" style="font-size: 30px"> </i>Verified
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 text-center">
                                        <div class="button-wrapper">
                                            <div class="btn-container" style="margin-top: 10px">
                                                <button><a href="#" class="btn btn-info d-flex align-items-center justify-content-center" style="height: 40px;width:150px;">Contact</a></button>
                                            </div>
                                            <div class="btn-container" style="margin-top: 10px">
                                                <button><a href="#" class="btn btn-success d-flex align-items-center justify-content-center" style="height: 40px;width:150px;">Follow</a></button>
                                            </div>
                                            <div class="btn-container" style="margin-top: 10px">
                                                <button><a href="#" class="btn btn-warning d-flex align-items-center justify-content-center" style="height: 40px;width:150px;">Share</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs mt-5 mb-5">
                            <li class="nav-item" id="seller-products">
                                <a class="nav-link active" aria-current="page" href="#">Product</a>
                              </li>
                            <li class="nav-item"  id="seller-reviews">
                              <a class="nav-link" href="#">Reviews</a>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>


            <div class="container" id="product-data">
                <div class="col-md-12">
                    <div id="list-type" class="proerty-th" >
                        @if (!empty($storeProducts))
                            @foreach ($storeProducts as $item)
                                <div class="col-sm-6 col-md-3 p0 mt-3">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ url('product-detail', $item->id) }}" target="_blank"><img
                                                    src="{{ asset($item->itemImage[0]->image) }}"></a>
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

            <div class="container" id="review-data" style="display: none">
                <section id="comments" class="comments " style="margin-top: 20px">
                    <h4 class="text-uppercase" style="margin-bottom: 20px">3 Reviews</h4>


                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="{{ asset('Frontend/assets/img/client-face1.png') }}" class="img-responsive" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star"></i>
                            </h5>
                            <p class="posted">Zahid Akbar (1 day ago)</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </p>
                        </div>
                    </div>
                    <!-- /.comment -->

                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="{{ asset('Frontend/assets/img/client-face1.png') }}" class="img-responsive" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star"></i>
                            </h5>
                            <p class="posted">Zahid Akbar (1 day ago)</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </p>
                        </div>
                    </div>
                    <!-- /.comment -->

                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="{{ asset('Frontend/assets/img/client-face1.png') }}" class="img-responsive" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star"></i>
                            </h5>
                            <p class="posted">Zahid Akbar (1 day ago)</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </p>
                        </div>
                    </div>
                    <!-- /.comment -->

                </section>
            </div>

        </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

<!-- JavaScript to Show Product Data on Click -->
<script>
$(document).ready(function(){
    $("#seller-products").click(function(){

        $("#product-data").show();
        $("#review-data").hide();
    });

    $("#seller-reviews").click(function(){
        $("#product-data").hide();
        $("#review-data").show();
    });
});
</script>

@endsection
