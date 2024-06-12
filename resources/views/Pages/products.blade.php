@extends('frontend_layout')
@section('content')


<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row  pr0 padding-top-40 properties-page">
            <div class="col-md-12 padding-bottom-40 large-search">
                <div class="search-form wow pulse">
                    <form action="" class=" form-inline">
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <input type="text" class="form-control" placeholder="Key word">
                            </div>
                            <div class="col-md-5">
                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Category">
                                    <option>New york, CA</option>
                                    <option>Paris</option>
                                    <option>Casablanca</option>
                                    <option>Tokyo</option>
                                    <option>Marraekch</option>
                                    <option>kyoto , shibua</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="search-row">

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> New Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Used Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Free Shipping
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Auction Item
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Verified Seller
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:20px ">
                            <div class="search-row pull-right">
                                <button type="button" class="btn btn-info">Search</button>
                                <button type="button" class="btn btn-info">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12  clear">
                <div class="col-xs-10 page-subheader sorting pl0">
                    <ul class="sort-by-list">
                        {{-- <li class="active">
                            <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                Property Date <i class="fa fa-sort-amount-asc"></i>
                            </a>
                        </li> --}}
                        <li class="">
                            <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                Property Price <i class="fa fa-sort-numeric-desc"></i>
                            </a>
                        </li>
                    </ul><!--/ .sort-by-list-->

                    <div class="items-per-page">
                        {{-- <label for="items_per_page"><b>Property per page :</b></label> --}}
                        <div class="sel">
                            <select name="per_page">
                                <option value="3">Low Price To Hight</option>
                                <option value="3">Hight Price To Low</option>
                            </select>
                        </div><!--/ .sel-->
                    </div><!--/ .items-per-page-->
                </div>

                <div class="col-xs-2 layout-switcher">
                    <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                    <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                </div><!--/ .layout-switcher-->
            </div>

            <div class="col-md-12 clear ">
                <div id="list-type" class="proerty-th">
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-3.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>

                                <div class="dealer-action pull-right">                                        
                                    <a href="submit-property.html" class="button">Edit </a>
                                    <a href="#" class="button delete_user_car">Delete</a>
                                    <a href="property-1.html" class="button">View</a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-2.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item proerty-item-ads">
                            <a href="" ><img src="Frontend/assets/img/pro-ads.jpg"></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-3.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-1.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-2.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-3.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-2.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-1.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item proerty-item-ads">
                            <a href="" ><img src="Frontend/assets/img/pro-ads.jpg"></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-2.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html" ><img src="Frontend/assets/img/demo/property-1.jpg"></a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="property-1.html"> Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right"> $ 300,000</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="Frontend/assets/img/icon/bed.png">(5)|
                                    <img src="Frontend/assets/img/icon/shawer.png">(2)|
                                    <img src="Frontend/assets/img/icon/cars.png">(1)
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 clear">
                <div class="pull-right">
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
