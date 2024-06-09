@extends('frontend_layout')
@section('content')


<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{ URL::to('update-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="profiel-header">
                        <h3>
                            <b>Change Password</b> <br>
                        </h3>
                        <hr>
                    </div>

                    <div class="">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Current Password:</label>
                                <input name="shipping_address" type="text" class="form-control" placeholder="Enter Current Password">

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>New Password:</label>
                                <input name="permanent_address" type="text" class="form-control" placeholder="New Password">

                                @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center">
                        <br>
                        <input type='submit' class='btn btn-finish btn-success' name='saveChange' value='Change Password' onclick="return confirm('are you sure to change password?')" />
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->

</div>
</div>

@endsection
