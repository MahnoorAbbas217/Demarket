@extends('frontend_layout')
@section('content')

    <!-- property area -->
    <div class="properties-area recent-property" style="background-color: #FFF;">
        <div class="container">
            <div class="row">

                <div class="col-md-12  pr0 padding-top-40 properties-page">

                    <div class="col-md-12 clear">
                        <h3 class="card-title">My Items</h3>

                        @if (Session::has('message'))
                            <p class="bg-info p3 mt-3 text-dark-bold">{{ Session::get('message') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">
                            @if (!empty($myItems))
                                @foreach ($myItems as $item)
                                    <div class="col-sm-6 col-md-3 p0 mt-3">
                                        <div class="box-two proerty-item">
                                            <div class="item-thumb">
                                                <a href="#" target="_blank"><img
                                                        src="{{ $item->itemImage[0]->image }}"></a>
                                            </div>

                                            <div class="item-entry overflow">
                                                <h5><a href="#"> {{ $item->item_title }}</a></h5>
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

                                                <div class="dealer-action text-center mt-4">
                                                    <a href="#"><i class="fa fa-pencil text-info"
                                                            style="font-size: 20px"></i> </a>
                                                    <a href="{{ url('delete-my-item') . '/' . $item->id }}"
                                                        onclick="return confirm('Are you sure to Delete this item?')"><i
                                                            class="fa fa-trash text-danger" style="font-size: 20px"></i></a>
                                                    <a href="#"><i class="fa fa-eye text-success"
                                                            style="font-size: 20px"></i></a>
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
