@extends('frontend_layout')
@section('content')


<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{ URL::to('identity-verification') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="profiel-header">
                        <h3>
                            <b>Identity Verification</b> <br>

                            @if (Session::has('message'))
                                <p class="bg-info p3 mt-3 text-dark-bold text-center">{{ Session::get('message') }}</p>
                            @endif
                        </h3>
                        <hr>
                    </div>

                    <div class="">
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="picture-container">
                                <div class="picture">
                                    <label>CNIC Front Copy</label>
                                    <img src="{{ Auth::user()->cnic_front_copy ?? 'uploads/user/ad-default.png' }}" class="picture-src" id="wizardPicturePreview" title=""/>
                                    <input type="file" name="cnic_front_copy" id="wizard-picture">

                                    @error('cnic_front_copy')
                                        <span class="invalid-feedback text-danger" role="alert">
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
                                    <img src="{{ Auth::user()->cnic_back_copy ?? 'uploads/user/ad-default.png' }}" class="picture-src" id="wizardPicturePreview0" title=""/>
                                    <input type="file" name="cnic_back_copy" id="wizard-picture0">

                                    @error('cnic_back_copy')
                                        <span class="invalid-feedback text-danger" role="alert">
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
                                <input name="date_of_birth" type="date" class="form-control" value="{{ Auth::user()->date_of_birth ?? old('date_of_birth') }}" required="true" @if(Auth::user()->identity_verification_status != '' || Auth::user()->identity_verification_status != 'rejected') readonly @endif>

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
                        @if(Auth::user()->identity_verification_status == '' || Auth::user()->identity_verification_status == 'rejected')
                            <input type='submit' class='btn btn-finish btn-success' name='saveChange' value='Verify Identity' onclick="return confirm('are you sure to submit identity verification?')" />

                            @if(Auth::user()->identity_verification_status == 'rejected') <p>Information Invalid Please Resumit your informcation to verify your Account Thanks!</p> @endif
                        @else
                            <h4>Identity Verification Status: <span class="text-uppercase">{{ Auth::user()->identity_verification_status }}</span></h4>
                            <p>Once you submit the information, allow up to 3 business days for review.</p>
                        @endif
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->

</div>
</div>

@endsection
