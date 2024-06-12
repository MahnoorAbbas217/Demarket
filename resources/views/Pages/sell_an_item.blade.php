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
                                            <input name="item_title" id="item_title" type="text" class="form-control" placeholder="Shoes, Stone, Bags ....">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Condition :</label>
                                                <select id="item_condition" name="item_condition" class="selectpicker  form-control" required>
                                                    <option value="new">New</option>
                                                    <option  value="used">Used</option>
                                                    <option value="open_box">Open Box</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Category</label>
                                                <select id="item_category" name="item_category" class="selectpicker show-tick" data-live-search="true" data-live-search-style="begins" title="Select Category">
                                                    @if(!empty($categories))
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Sub Category</label>
                                                <select id="item_sub_category" name="item_sub_category" class="selectpicker show-tick" data-live-search="true" data-live-search-style="begins" title="Select SubCategory">
                                                    

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Item Sale Type :</label>
                                                <select id="item_sale_type" name="item_sale_type" class="selectpicker  form-control">
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

                                <div class="col-sm-12" id="item_condition_description" style="display: none">
                                    <div class="form-group">
                                        <label>Condition Description</label>
                                        <input name="condition_description" id="condition_description" type="text" class="form-control" placeholder="Condition Description">
                                    </div>
                                </div>

                                 <h4 class="info-text"><b>Pricing</b> </h4>
                                <div class="row">

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input name="quantity" id="quantity" type="number" class="form-control" placeholder="Item Quantity" value="1" min="1" max="20">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="auction_bidding_price" style="display: none">
                                        <div class="form-group">
                                            <label>Start Bid Price</label>
                                            <input name="start_bid_price" id="start_bid_price" type="number" class="form-control" min="1" value="0" placeholder="Minimum Bidding Price">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Buy It Now Price</label>
                                            <input name="buy_it_now_price" id="buy_it_now_price" value="0" type="number" class="form-control" placeholder="Demand Price">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="auction_bidding_duration" style="display: none">
                                        <div class="form-group">
                                            <label>Auction Duration</label>
                                            <select id="auction_duration" name="auction_duration" class="selectpicker  form-control">
                                                <option value="1day">3 Days</option>
                                                <option value="3days">3 Days</option>
                                                <option value="7days">7 Days</option>
                                                <option value="10days">10 Days</option>
                                                <option value="15days">15 Days</option>
                                                <option value="30days">15 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Shipping Price</label>
                                            <input name="shipping_price" id="shipping_price" type="number" class="form-control" placeholder="Shipping Price">
                                        </div>
                                    </div>

                                    <div class="col-sm-3" id="">
                                        <div class="form-group">
                                            <label>Shipping Duration</label>
                                            <select id="shipping_duration" name="shipping_duration" class="selectpicker  form-control">
                                                <option value="1day">1 Days</option>
                                                <option value="3days">3 Days</option>
                                                <option value="7days">7 Days</option>
                                                <option value="10days">10 Days</option>
                                                <option value="15days">15 Days</option>
                                                <option value="20days">20 Days</option>
                                                <option value="30days">30 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End step 2 -->

                            <div class="tab-pane" id="step3">

                                <h4 class="info-text"><b>Additional Information</b> </h4>

                                <div id="additionalDetailsContainer">
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input name="property_title" id="item_additional_information_title_0" type="text" class="form-control" placeholder="Brand Name, Warranty, Color, Size ....">
                                            </div>
                                        </div>
                                
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label>Value</label>
                                                <input name="property_value" id="item_additional_information_value_0" type="number" class="form-control" placeholder="Bonanza, 7 Days, Red, 1f ....">
                                            </div>
                                        </div>
                                
                                        <div class="col-sm-2 col-md-2">
                                            <div class="form-group mt-4">
                                                <a id="add_more_item_additional_detail" class="text-success"><i class="fa fa-plus mt-5" style="font-size: 20px"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="row">
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

                                </div> --}}


                                {{-- <div class="row">
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
                                            <a id="remove_item_additional_information" class="text-danger"><i class="fa fa-trash mt-5" style="font-size: 20px"></i></a>
                                        </div>
                                    </div>

                                </div> --}}

                            </div>
                            <!--  End step 3 -->


                            <div class="tab-pane" id="step4">

                                <div id="pictureUploadContainer">
                                    <div class="col-sm-4 col-lg-3 col-md-3 picture-item">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview0" title=""/>
                                                <input type="file" name="item_image[]" id="wizard-picture0">
                                
                                                @error('item_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <h6>Choose Picture</h6>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-4 col-lg-3 col-md-3" id="addMorePictures">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{ asset('Frontend/assets/img/plus-image.png') }}" class="picture-src" title="Add more pictures"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                

                               

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Video URL:</label>
                                        <input name="item_video_url" id="item_video_url" type="text" class="form-control" placeholder="https://example.com or (facebook, tiktok, insta, youtube any video url)" maxlength="">
                                    </div>
                                </div>
                                {{-- <h4 class="info-text"> Finished and submit </h4> --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">

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



<script>
    document.addEventListener('DOMContentLoaded', function () {
    let rowCount = 1;
    let uniqueId = 1; // Unique ID counter
    const maxRows = 10;
    const container = document.getElementById('additionalDetailsContainer');

    document.getElementById('add_more_item_additional_detail').addEventListener('click', function () {
        if (rowCount >= maxRows) {
            toastr.error('You can only add up to ' + maxRows + ' rows.', 'Error');
            return;
        }

        rowCount++;
        uniqueId++; // Increment the unique ID counter

        const newRow = document.createElement('div');
        newRow.className = 'row';
        newRow.innerHTML = `
            <div class="col-sm-5 col-md-5">
                <div class="form-group">
                    <label>Title</label>
                    <input name="item_additional_information_title[]" id="item_additional_information_title_${uniqueId}" type="text" class="form-control" placeholder="Brand Name, Warranty, Color, Size ...." required>
                </div>
            </div>
            <div class="col-sm-5 col-md-5">
                <div class="form-group">
                    <label>Value</label>
                    <input name="item_additional_information_value[]" id="item_additional_information_value_${uniqueId}" type="number" class="form-control" placeholder="Bonanza, 7 Days, Red, 1f ...." required>
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <div class="form-group mt-4">
                    <a class="remove_item_additional_information text-danger"><i class="fa fa-trash mt-5" style="font-size: 20px"></i></a>
                </div>
            </div>
        `;

        container.appendChild(newRow);

        newRow.querySelector('.remove_item_additional_information').addEventListener('click', function () {
            container.removeChild(newRow);
            rowCount--;
        });
    });
});



document.addEventListener('DOMContentLoaded', function () {
    let container = document.getElementById('pictureUploadContainer');
    let addMorePicturesButton = document.getElementById('addMorePictures');
    let pictureCount = 1;
    const maxPictures = 20;

    addMorePicturesButton.addEventListener('click', function () {
        if (pictureCount >= maxPictures) {
            alert('You can only add up to ' + maxPictures + ' pictures.');
            return;
        }

        pictureCount++;

        const newPictureContainer = document.createElement('div');
        newPictureContainer.className = 'col-sm-4 col-lg-3 col-md-3 picture-item';
        newPictureContainer.innerHTML = `
            <div class="picture-container">
                <div class="picture">
                    <img src="{{ asset('Frontend/assets/img/avatar.png') }}" class="picture-src" id="wizardPicturePreview${pictureCount}" title=""/>
                    <input type="file" name="item_image[]" id="wizard-picture${pictureCount}">
                    
                    @error('item_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <h6>Choose Picture</h6>
            </div>
                
            <a class="remove-picture text-danger text-center" style="cursor:pointer;">Remove</a>
        `;

        container.insertBefore(newPictureContainer, addMorePicturesButton);

        newPictureContainer.querySelector('.remove-picture').addEventListener('click', function (event) {
            event.stopPropagation(); // Prevent triggering the input click
            container.removeChild(newPictureContainer);
            pictureCount--;
        });
    });
});


</script>
@endsection
