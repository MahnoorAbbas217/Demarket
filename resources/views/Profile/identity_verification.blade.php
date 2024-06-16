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
                            <b>Identity Verification</b> <br>
                        </h3>
                        <hr>
                    </div>

                    <div class="">
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="picture-container">
                                <div class="picture">
                                    <label>CNIC Front Copy</label>
                                    <img src="{{ Auth::user()->profile_image ?? 'uploads/user/ad-default.png' }}" class="picture-src" id="wizardPicturePreview" title=""/>
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

                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="picture-container">
                                <div class="picture">
                                    <label>CNIC Back Copy</label>
                                    <img src="{{ Auth::user()->profile_image ?? 'uploads/user/ad-default.png' }}" class="picture-src" id="wizardPicturePreview0" title=""/>
                                    <input type="file" name="profile_image" id="wizard-picture0">

                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>Choose Picture</h6>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input name="date_of_birth" type="date" class="form-control" placeholder="Your Home Address" value="{{ Auth::user()->date_of_birth ?? old('date_of_birth') }}">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center">
                        <br>
                        <input type='submit' class='btn btn-finish btn-success' name='saveChange' value='Verify Identity' onclick="return confirm('are you sure to submit identity verification?')" />
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->

</div>
</div>

@endsection
