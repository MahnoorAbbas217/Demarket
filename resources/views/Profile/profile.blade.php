@extends('frontend_layout')
@section('content')

    @if (Session::has('message'))
        <p class="bg-info p3 mt-3 text-dark-bold text-center">{{ Session::get('message') }}</p>
    @endif

    <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 profiel-container">
                    <form action="{{ URL::to('update-profile' . '/' . Auth::user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="profiel-header">
                            <h3>
                                <b>BUILD YOUR PROFILE </b> <br>
                                <small>This information will let us know more about you.</small>
                            </h3>
                            <hr>
                        </div>

                        <div class="clear">
                            <div class="col-sm-5 col-lg-5 col-md-5 col-sm-offset-1">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ Auth::user()->profile_image ?? 'uploads/user/ad-default.png' }}"
                                            class="picture-src" id="wizardPicturePreview" title="" />
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
                                    <label>Name <small>(required)</small></label>
                                    <input name="name" type="text" class="form-control"
                                        value="{{ Auth::user()->name ?? old('name') }}" placeholder="e.g Zahid">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</stron>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email <small>(required)</small></label>
                                    <input name="email" type="email" class="form-control"
                                        placeholder="example@gmail.com" value="{{ Auth::user()->email ?? '' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Mobile # <small>(required)</small></label>
                                    <input name="mobile_no" type="number" class="form-control" placeholder="92xxxxxxxxx"
                                        value="{{ Auth::user()->mobile_no ?? old('mobile_no') }}" readonly>

                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong
                                                class="text-danger">{{ 'mobile no. must start from 92 and must be 12 digits.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="">
                            <br>
                            <hr>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>City Name :</label>
                                    @php $cities = \App\Models\City::all(); @endphp

                                    <select name="city_name" class="selectpicker" data-live-search="true"
                                        data-live-search-style="begins">
                                        <option value="">Select City</option>
                                        @if (!empty($cities))
                                            @foreach ($cities as $key => $city)
                                                <option value="{{ $city->city_name }}"
                                                    @if (Auth::user()->city_name == $city->city_name) selected @endif>
                                                    {{ $city->city_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @error('city_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Shipping Address:</label>
                                    <input name="shipping_address" type="text" class="form-control"
                                        placeholder="Location where you want to receive your parcel..."
                                        value="{{ Auth::user()->shipping_address ?? old('shipping_address') }}">

                                    @error('shipping_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Permanent Address:</label>
                                    <input name="permanent_address" type="text" class="form-control"
                                        placeholder="Your Home Address"
                                        value="{{ Auth::user()->personal_address ?? old('permanent_address') }}">

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
                            <input type='submit' class='btn btn-finish btn-success' name='saveChange'
                                value='Update Profile' onclick="return confirm('are you sure to update profile?')" />
                        </div>
                        <br>
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>

@endsection
