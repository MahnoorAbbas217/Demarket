@extends('frontend_layout')
@section('content')


<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row  pr0 padding-top-40 properties-page">
            <div class="col-md-12 padding-bottom-40 large-search">
                <div class="search-form wow pulse">
                    <form action="" class=" form-inline">
                        <div class="col-md-12 ">
                            <div class="profiel-header">
                                <h5>
                                    <b>Update Setting</b>
                                </h5>
                                <hr>
                            </div>
                            <div class="search-row">

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Whatsapp Notification
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Email Notification
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Allow Whatsapp Chat
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Web Notification
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:20px ">
                            <div class="search-row pull-right">
                                <button type="button" class="btn btn-success">Update Setting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
