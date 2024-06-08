@extends('frontend_layout')
@section('content')


<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix" >
            <div class="wizard-container">

                <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="wizard-header mb-3">
                            <h3>
                                <b>Sell your Item</b>  <br>
                            </h3>
                        </div>



                        <ul>
                            <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                            <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                            <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                            <li><a href="#step4" data-toggle="tab">Finished </a></li>
                        </ul>

                       <div class="tab-content">

                            <div class="tab-pane" id="step1">
                                <div class="row p-b-15  ">
                                    <h4 class="info-text"><b>Item information</b></h4>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Item Title <small>(*)</small></label>
                                            <input name="ad_title" id="item_title" type="text" class="form-control" placeholder="Shoes, Stone, Bags ....">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Condition :</label>
                                                <select id="property_type" name="item_condition" class="selectpicker  form-control" required>
                                                    <option value="new">New</option>
                                                    <option  value="used">Used</option>
                                                    <option value="open_box">Open Box</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Category</label>
                                                <select id="city" name="city" class="selectpicker show-tick" data-live-search="true" data-live-search-style="begins" title="Select Category">
                                                    @if(!empty($cities))
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Sub Category</label>
                                                <select id="city" name="city" class="selectpicker show-tick" data-live-search="true" data-live-search-style="begins" title="Select SubCategory">
                                                    @if(!empty($cities))
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Sale Type :</label>
                                                <select id="occupation" name="occupation" class="selectpicker  form-control">
                                                    <option value="buy_it_now">Buy It Now</option>
                                                    <option value="auction">Auction</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 1 -->

                            <div class="tab-pane" id="step2">

                                <div class="col-sm-12" id="condition_description">
                                    <div class="form-group">
                                        <label>Condition Description</label>
                                        <input name="property_address" id="" type="text" class="form-control" placeholder="Address ..">
                                    </div>
                                </div>

                                 <h4 class="info-text"><b>Pricing</b> </h4>
                                <div class="row">

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input name="property_address" id="" type="number" class="form-control" placeholder="Item Quantity" min="1">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Start Bid Price</label>
                                            <input name="property_address" id="" type="number" class="form-control" placeholder="Minimum Bidding Price">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Buy It Now Price</label>
                                            <input name="property_address" id="" type="number" class="form-control" placeholder="Demand Price" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Auction Duration</label>
                                            <select id="occupation" name="occupation" class="selectpicker  form-control">
                                                <option value="3">3 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="10">10 Days</option>
                                                <option value="15">15 Days</option>
                                                <option value="30">15 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Shipping Price</label>
                                            <input name="property_address" id="" type="number" class="form-control" placeholder="Shipping Price" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Shipping Duration</label>
                                            <select id="occupation" name="occupation" class="selectpicker  form-control">
                                                <option value="1">1 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="10">10 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End step 2 -->

                            <div class="tab-pane" id="step3">

                                <h4 class="info-text"><b>Additional Information</b> </h4>

                                <div class="row">
                                    <div class="col-sm-5 col-md-5" id="">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name="property_address" id="property_address" type="text" class="form-control" placeholder="Brand Name, Warranty, Color, Size ...." required>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 col-md-5" id="">
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input name="property_address" id="property_address" type="number" class="form-control" placeholder="Bonanza, 7 Days, Red, 1f ...." required>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 col-md-2" id="">
                                        <div class="form-group mt-4">
                                            <a href="#" class="text-success"><i class="fa fa-plus mt-5" style="font-size: 20px"></i></a>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-5 col-md-5" id="">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name="property_address" id="property_address" type="text" class="form-control" placeholder="Brand Name, Warranty, Color, Size ...." required>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 col-md-5" id="">
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input name="property_address" id="property_address" type="number" class="form-control" placeholder="Bonanza, 7 Days, Red, 1f ...." required>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 col-md-2" id="">
                                        <div class="form-group mt-4">
                                            <a href="#" class="text-danger"><i class="fa fa-trash mt-5" style="font-size: 20px"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!--  End step 3 -->


                            <div class="tab-pane" id="step4">

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview0" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/plus-image.png') }}" class="picture-src" title=""/>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview1" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture1">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview2" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture2">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview3" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture3">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview4" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture4">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview5" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture5">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview6" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture6">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview7" title=""/>
                                            <input type="file" name="profile_image" id="wizard-picture7">

                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div> --}}


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Video URL:</label>
                                        <input name="ad_video_url" id="ad_video_url" type="text" class="form-control" placeholder="https://example.com or (facebook, tiktok, insta, youtube any video url)">
                                    </div>
                                </div>
                                {{-- <h4 class="info-text"> Finished and submit </h4> --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="">
                                            {{-- <p>
                                                <label><strong>Terms and Conditions</strong></label>
                                                By accessing or using  <b>Budget Room</b> services, such as
                                                posting your property advertisement with your personal
                                                information on our website you agree to the
                                                collection, use and disclosure of your personal information
                                                in the legal proper manner
                                            </p> --}}

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="accept_term_conditions" name="accept_term_conditions" required /> <strong>Accept termes and conditions.</strong>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 4 -->

                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!-- End submit form -->
            </div>
        </div>
    </div>
</div>

@endsection
