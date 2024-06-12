@extends('frontend_layout')
@section('content')

<style>
    .modal {
        display: none;
        /* position: fixed;
        z-index: 1;
        left: 0;
        top: 0; */
        width: 100%;
        height: 100%;
        /* overflow: auto; */
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        animation-name: slidein;
        animation-duration: 0.5s;
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        transform: translateY(-100%);
        transition: transform 0.5s ease-out;
    }
    .modal.show .modal-content {
        transform: translateY(0);
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    @media (max-width: 768px) {
        .modal-content {
            width: 90%;
            margin: 30% auto;
        }
    }
</style>

 <!-- property area -->
 <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">

        <div class="clearfix padding-top-40" >

            <div class="col-md-8 single-property-content prp-style-1 ">
                <div class="row">
                    <div class="light-slide-item">
                        <div class="clearfix">
                            <div class="favorite-and-print">
                                <h5 class="bg-primary" style="padding: 5px">Bidding</h5>
                            </div>

                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <li data-thumb="{{ asset('Frontend/assets/img/property-1/property1.jpg') }}">
                                    <img src="{{ asset('Frontend/assets/img/property-1/property1.jpg') }}" />
                                </li>
                                <li data-thumb="{{ asset('Frontend/assets/img/property-1/property2.jpg') }}">
                                    <img src="{{ asset('Frontend/assets/img/property-1/property3.jpg') }}" />
                                </li>
                                <li data-thumb="{{ asset('Frontend/assets/img/property-1/property3.jpg') }}">
                                    <img src="{{ asset('Frontend/assets/img/property-1/property3.jpg') }}" />
                                </li>
                                <li data-thumb="{{ asset('Frontend/assets/img/property-1/property4.jpg') }}">
                                    <img src="{{ asset('Frontend/assets/img/property-1/property4.jpg') }}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-property-wrapper">
                    <div class="single-property-header">
                        <h1 class="property-title pull-left">Villa in Coral Gables</h1>

                        <!-- End features area  -->
                        <span class="property-price pull-right">Rs 825,000</span>
                    </div>

                    <div class="section property-features">

                        <a class="btn btn-info" style="" onclick="toastrSuccess('Item Added To Cart Successfully!', 'Success')">Add to Cart</a>
                        <a href="#" class="btn btn-warning" style="" id="createOfferBtn">Create Offer</a>
                        <a href="#" class="btn btn-success" style="">Buy it Now</a>

                        {{-- <ul>
                            <li><a href="#">category</a></li>
                            <li><a href="#">sub category</a></li>
                        </ul> --}}

                    </div>

                    {{-- <div class="property-meta entry-meta clearfix ">

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-tag">
                                <img src="assets/img/icon/sale-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Status</span>
                                <span class="property-info-value">For Sale</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info icon-area">
                                <img src="assets/img/icon/room-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Area</span>
                                <span class="property-info-value">3500<b class="property-info-unit">Sq Ft</b></span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bed">
                                <img src="assets/img/icon/bed-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bedrooms</span>
                                <span class="property-info-value">3</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bed">
                                <img src="assets/img/icon/cars-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Car garages</span>
                                <span class="property-info-value">1</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bath">
                                <img src="assets/img/icon/os-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bathrooms</span>
                                <span class="property-info-value">3.5</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-garage">
                                <img src="assets/img/icon/room-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Garages</span>
                                <span class="property-info-value">2</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-garage">
                                <img src="assets/img/icon/shawer-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Garages</span>
                                <span class="property-info-value">2</span>
                            </span>
                        </div>


                    </div> --}}
                    <!-- .property-meta -->

                    <div class="section">
                        <h4 class="s-property-title">Short Description</h4>
                        <div class="s-property-content">
                            <p>Nulla quis dapibus nisl. Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies commodo arcu nec pretium. Nullam sed arcu ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies                                </p>
                        </div>
                    </div>
                    <!-- End description area  -->

                    <div class="section additional-details">

                        <h4 class="s-property-title">Additional Details</h4>

                        <ul class="additional-details-list clearfix">
                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Waterfront</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Yes</span>
                            </li>

                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Built In</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">2003</span>
                            </li>
                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Parking</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">2 Or More Spaces,Covered Parking,Valet Parking</span>
                            </li>

                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Waterfront</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Yes</span>
                            </li>

                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">View</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Intracoastal View,Direct ew</span>
                            </li>

                            <li>
                                <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Waterfront Description:</span>
                                <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Intracoastal Front,Ocean Access</span>
                            </li>

                        </ul>
                    </div>
                    <!-- End additional-details area  -->

                    {{-- <div class="section property-video">
                        <h4 class="s-property-title">Property Video</h4>
                        <div class="video-thumb">
                            <a class="video-popup" href="yout" title="Virtual Tour">
                                <img src="{{ asset('Frontend/assets/img/property-video.jpg') }}" class="img-responsive wp-post-image" alt="Exterior">
                            </a>
                        </div>
                    </div> --}}
                    <!-- End video area  -->



                    {{-- <div class="section property-share">
                        <h4 class="s-property-title">Share width your friends </h4>
                        <div class="roperty-social">
                            <ul>
                                <li><a title="Share this on dribbble " href="#"><img src="assets/img/social_big/dribbble_grey.png"></a></li>
                                <li><a title="Share this on facebok " href="#"><img src="assets/img/social_big/facebook_grey.png"></a></li>
                                <li><a title="Share this on delicious " href="#"><img src="assets/img/social_big/delicious_grey.png"></a></li>
                                <li><a title="Share this on tumblr " href="#"><img src="assets/img/social_big/tumblr_grey.png"></a></li>
                                <li><a title="Share this on digg " href="#"><img src="assets/img/social_big/digg_grey.png"></a></li>
                                <li><a title="Share this on twitter " href="#"><img src="assets/img/social_big/twitter_grey.png"></a></li>
                                <li><a title="Share this on linkedin " href="#"><img src="assets/img/social_big/linkedin_grey.png"></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- End video area  -->



                </div>


                {{-- create offer model --}}

                <div id="createOfferModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Create Offer</h2>
                        <form>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" placeholder="Enter account">
                            </div>
                            <div class="form-group">
                                <label for="explanation">Short Explanation</label>
                                <input type="text" class="form-control" id="explanation" placeholder="Enter short explanation">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                {{-- create offer model end here --}}


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











            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">

                                <div class="clear">
                                    <div class="col-xs-4 col-sm-4 dealer-face">
                                        <a href="">
                                            <img src="{{ asset('Frontend/assets/img/client-face1.png') }}" class="img-circle">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 ">
                                        <h3 class="dealer-name">
                                            <a href="#">Nathan James</a>
                                            <p><i class="fa fa-star text-warning"></i> (3.9)</p>
                                        </h3>

                                    </div>

                                    <div class="dealer-social-media">
                                        <div class="row text-center" style="margin-top: 30px !important">
                                            <div class="col-sm-2">
                                                <i class="pe-7s-mail strong" style="font-size: 15px"> </i>Verified
                                            </div>

                                            <div class="col-sm-2">
                                                <i class="pe-7s-call strong" style="font-size: 15px"> </i>Verified
                                            </div>

                                            <div class="col-sm-2">
                                                <i class="pe-7s-user strong" style="font-size: 18px"> </i>Verified
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="clear text-center" style="margin-top: 20px">
                                    <a href="{{ url('store') }}" class="btn btn-info btn-sm">Visit Store</a>
                                    <a href="#" class="btn btn-success btn-sm">Contact Seller</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu similar-property-wdg">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sponsored Items</h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                                <ul>
                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="#"><img src="{{ asset('Frontend/assets/img/demo/small-property-2.jpg') }}"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">Bidding</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="#">Super nice villa </a></h6>
                                        <span class="property-price">Rs 349</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="#"><img src="{{ asset('Frontend/assets/img/demo/small-property-2.jpg') }}"></a>

                                        <span class="property-seeker">
                                            <b class="b-2">Fixed</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="#">Super nice villa </a></h6>
                                        <span class="property-price">Rs 349</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="#"><img src="{{ asset('Frontend/assets/img/demo/small-property-2.jpg') }}"></a>

                                        <span class="property-seeker">
                                            <b class="b-2">Fixed</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="#">Super nice villa </a></h6>
                                        <span class="property-price">Rs 349</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="#"><img src="{{ asset('Frontend/assets/img/demo/small-property-2.jpg') }}"></a>

                                        <span class="property-seeker">
                                            <b class="b-1">Bidding</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="#">Super nice villa </a></h6>
                                        <span class="property-price">Rs 349</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    {{-- <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ads her  </h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                            <img src="assets/img/ads.jpg">
                        </div>
                    </div> --}}

                </aside>
            </div>
        </div>

    </div>
</div>


<script>
    // Get the modal
    var modal = document.getElementById("createOfferModal");

    // Get the button that opens the modal
    var btn = document.getElementById("createOfferBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.classList.add('show');
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.classList.remove('show');
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove('show');
            modal.style.display = "none";
        }
    }
</script>

@endsection
