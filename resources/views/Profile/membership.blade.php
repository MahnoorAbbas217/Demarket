@extends('frontend_layout')
@section('content')

<!-- register-area -->
<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">

        @if(!empty($memberships))
            @foreach ($memberships as $membership)
                <div class="col-md-4">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2 class="text-uppercase">{{ $membership->title }} </h2>
                                <ul>
                                    <li><b>Items Per Month:</b> {{ $membership->allow_products_per_month }}</i></li>
                                    <li><b>Sale Commission:</b> {{ $membership->sale_commission }} %</i></li>
                                    <li><b>images Allow:</b> {{ $membership->images_allow }}</i></li>
                                    <li><b>Item Video Allow:</b> {{ $membership->allow_product_video }}</i></li>
                                    <li><b>Widthdraw Duration:</b> {{ $membership->withdraw_duration }} Days</i></li>
                                </ul>

                                <div class="row text-right" style="margin-right: 5px">
                                    <a href="{{ url('upgrade-membership?to='.$membership->title) }}" class="btn btn-info">{{ Auth::user()->membership_id == $membership->id ? 'Current Membership' : 'Upgrade' }}</a>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- <div class="col-md-4">
            <div class="box-for overflow">
                <div class="col-md-12 col-xs-12 register-blocks">
                    <h2>Free Ads: </h2>
                        <ul>
                            <li>Submit Ad <i class="fa fa-check text-success"></i></li>
                            <li>Show in Smart Search <i class="fa fa-close text-danger"></i></li>
                            <li>Recommend to Users <i class="fa fa-close text-danger"></i></li>
                            <li>Valid for 7 Days <i class="fa fa-check text-success"></i></li>
                            <li>Share to Social Media <i class="fa fa-close text-danger"></i></li>
                            <li>Display Social Acounts <i class="fa fa-close text-danger"></i></li>
                            <li>First 5 Ads Free <i class="fa fa-check text-success"></i></li>
                        </ul>

                        <div class="row text-right" style="margin-right: 5px">
                            <a href="{{ url('create-ad?type=free') }}" class="btn btn-success">Submit Free Ad</a>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box-for overflow">
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Gold Ads : </h2>
                    <ul>
                        <li>Submit Ad <i class="fa fa-check text-success"></i></li>
                        <li>Show in Smart Search <i class="fa fa-check text-success"></i></li>
                        <li>Recommend to Users <i class="fa fa-check text-success"></i></li>
                        <li>Valid for 30 Days <i class="fa fa-check text-success"></i></li>
                        <li>Share to Social Media <i class="fa fa-check text-success"></i></li>
                        <li>Display Social Acounts <i class="fa fa-check text-success"></i></li>
                        <li>Unlimited Ads Allow <i class="fa fa-check text-success"></i></li>
                        <li>Insights <i class="fa fa-check text-success"></i></li>
                    </ul>
                    <div class="row text-right" style="margin-right: 5px">
                        <a href="{{ url('create-ad?type=gold') }}" class="btn btn-danger">Gold: Try Free Trail</a>
                    </div>
                </div>


            </div>
        </div> --}}

        {{-- <div class="col-md-4">
            <div class="box-for overflow">
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Gold Ads : </h2>
                    <ul>
                        <li>Submit Ad <i class="fa fa-check text-success"></i></li>
                        <li>Show in Smart Search <i class="fa fa-check text-success"></i></li>
                        <li>Recommend to Users <i class="fa fa-check text-success"></i></li>
                        <li>Valid for 30 Days <i class="fa fa-check text-success"></i></li>
                        <li>Share to Social Media <i class="fa fa-check text-success"></i></li>
                        <li>Display Social Acounts <i class="fa fa-check text-success"></i></li>
                        <li>Unlimited Ads Allow <i class="fa fa-check text-success"></i></li>
                        <li>Insights <i class="fa fa-check text-success"></i></li>
                    </ul>
                    <div class="row text-right" style="margin-right: 5px">
                        <a href="{{ url('create-ad?type=gold') }}" class="btn btn-danger">Gold: Try Free Trail</a>
                    </div>
                </div>


            </div>
        </div> --}}

    </div>
</div>


@endsection
