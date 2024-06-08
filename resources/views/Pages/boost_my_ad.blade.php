@extends('frontend_layout')

@section('content')

<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">

        <div class="row">
            <div class="box-for overflow">
                <div class="col-md-12 register-blocks">
                    <h2>Boost Your Ad : </h2>
                    <form method="POST" action="{{ URL::to('ad-boost') }}" onsubmit="return transectionFormValidaton()" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 clear">
                                <div id="list-type" class="proerty-th-list">
                                    @if(!empty($ad))

                                        <?php
                                            $costType = $ad->cost_room_type;
                                            $showCostType = 'Day';

                                            if($costType == 'per_month'){
                                                $showCostType = 'Month';
                                            }

                                            if($costType == 'per_week'){
                                                $showCostType = 'Week';
                                            }
                                        ?>

                                        <div class="col-sm-6 col-md-3 p0 mt-3">
                                                <div class="box-two proerty-item">
                                                    <div class="item-thumb">
                                                        <a href="{{ url('ad-detail', $ad->id) }}" ><img src="{{ asset($ad->ad_image) }}"></a>
                                                    </div>

                                                    <div class="item-entry overflow">
                                                        <h5><a href="{{ url('ad-detail') }}"> {{ $ad->ad_title }}</a></h5>
                                                        <div class="dot-hr"></div>
                                                        <span class="pull-left"><b> City :</b> {{ $ad->city_name }} </span>
                                                        <span class="proerty-price pull-right">{{ env('CurrencySymbol') }}: {{ $ad->cost }}/{{ $showCostType }}</span>
                                                    </div>


                                                </div>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>

                        @if($ad->ads_listing_payment_status == "pending")
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="payment_method" id="payment_method_select">
                                        <option value="">Payment Method</option>
                                        <option value="online_jazzcash" @if(old('payment_method') == 'online_jazzcash') selected @endif>Online Jazzcash</option>
                                        <option value="direct_jazzcash" @if(old('payment_method') == 'direct_jazzcash') selected @endif>From Jazzcash App</option>
                                        <option value="direct_easypassa" @if(old('payment_method') == 'direct_easypassa') selected @endif>From Easypassa App</option>
                                        <option value="direct_bank" @if(old('payment_method') == 'direct_bank') selected @endif>To Bank Account</option>
                                        <option value="direct_sadapay" @if(old('payment_method') == 'direct_sadapay') selected @endif>From Sadapay</option>
                                    </select>
                                </div>

                                <div class="col-md-8">

                                    <div class="payment_method">

                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <input type="hidden" value="{{ $ad->id }}" name="ad_id">
                                <button type="submit" class="btn btn-default">Boost Now</button>
                            </div>
                        @else
                            <div class="row text-center">
                                <span class="text-danger"><b>Already Payment Done and Ad Boosting...</b></span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $paymentMethod = 'paymentMethod'; ?>

<script type="text/javascript">
    function transectionFormValidaton(){
        var selectedPaymentMethod = $("#payment_method_select").val();

        if (selectedPaymentMethod == "") {
            alert("Please select a payment method.");
            return false;
        }

        var transactionId = $("#transection_id").val();
        var file = $("#transection_image").val();

        if (transactionId == "" && file == "") {
            alert("Please enter a transaction ID or upload transaction image to approve payment.");
            return false;
        }

        return true;
    }
</script>
<script>
    $(document).ready(function() {
        // Event listener for select change
        $("#payment_method_select").change(function() {
            var selectedPaymentMethod = $(this).val();

            // Send AJAX request
            $.ajax({
                url: "{{ url($paymentMethod) }}",
                method: 'GET',
                data: { payment_method: selectedPaymentMethod },
                success: function(response) {
                    // Update the .payment_method div with the received HTML content
                    $(".payment_method").html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>


@endsection
