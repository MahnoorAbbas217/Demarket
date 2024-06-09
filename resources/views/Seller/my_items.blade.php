@extends('frontend_layout')
@section('content')

<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">

        <div class="col-md-12  pr0 padding-top-40 properties-page">

            <div class="col-md-12 clear">
                <h3 class="card-title">My Items</h3>
            </div>

            <div class="col-md-12 clear">
                <div id="list-type" class="proerty-th">
                    @for($i = 1; $i < 9; $i++)

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

                                    <div class="dealer-action text-center mt-4">
                                        <a href="#"><i class="fa fa-pencil text-info" style="font-size: 20px"></i> </a>
                                        <a href="#"><i class="fa fa-trash text-danger" style="font-size: 20px"></i></a>
                                        <a href="#"><i class="fa fa-eye text-success" style="font-size: 20px"></i></a>
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


        </div>
        </div>
    </div>
</div>


@endsection
