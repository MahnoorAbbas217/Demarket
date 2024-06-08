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
                            <b>BUILD</b> YOUR PROFILE <br>
                            <small>This information will let us know more about you.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-5 col-lg-5 col-md-5 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{ Auth::user()->profile_image ?? 'assets/img/avatar.png' }}" class="picture-src" id="wizardPicturePreview" title=""/>
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

                        <div class="col-sm-5 col-lg-5 col-md-5 padding-top-25">

                            <div class="form-group">
                                <label>First Name <small>(required)</small></label>
                                <input name="first_name" type="text" class="form-control" value="{{ Auth::user()->first_name ?? '' }}" placeholder="e.g Zahid">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name <small>(required)</small></label>
                                <input name="last_name" type="text" class="form-control" value="{{ Auth::user()->last_name ?? '' }}" placeholder="e.g Akbar">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email <small>(required)</small></label>
                                <input name="email" type="email" class="form-control" placeholder="example@gmail.com" value="{{ Auth::user()->email ?? '' }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Mobile # <small>(required)</small></label>
                                <input name="mobile_no" type="number" class="form-control" placeholder="+92xxxxxxxxx" value="{{ Auth::user()->mobile_no ?? '' }}">

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>New Password <small>(enter value to change password)</small></label>
                                <input name="password" type="password" class="form-control" placeholder="XXXXXXXXXXX">
                                <small>if you want to change password, fill password input</small>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="clear">
                        <br>
                        <hr>
                        <br>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Facebook :</label>
                                <input name="facebook" type="url" class="form-control" placeholder="https://facebook.com/profile" value="{{ Auth::user()->facebook ?? '' }}">

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Tiktok :</label>
                                <input name="tiktok" type="url" class="form-control" placeholder="https://tiktok.com/profile" value="{{ Auth::user()->tiktok ?? '' }}">

                                @error('tiktok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-success' name='saveChange' value='Save Change' />
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->

</div>
</div>

@endsection
