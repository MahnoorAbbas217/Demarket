@extends('frontend_layout')
@section('content')


<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{ URL::to('update-password') }}" method="post">
                    @csrf
                    <div class="profiel-header">
                        <h3>
                            <b>Change Password</b> <br>

                            @if (Session::has('message'))
                                <p class="bg-info p3 mt-3 text-dark-bold text-center">{{ Session::get('message') }}</p>
                            @endif
                        </h3>
                        <hr>
                    </div>

                    <div class="">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Current Password:</label>
                                <input name="current_password" type="password" value="{{ old('current_password') }}" class="form-control" placeholder="Enter Current Password">

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>New Password:</label>
                                <input name="new_password" type="password" value="{{ old('new_password') }}" class="form-control" placeholder="New Password">

                                @error('new_password')
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
