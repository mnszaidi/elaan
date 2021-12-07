@extends('layouts.back.layout_auth')

@section('content')
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(back/dist/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <!--<span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>-->
                        <a class="text-black" href="{{ url('/') }}"><h3 class="text-black font-medium m-b-20">Laravel</h3></a>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row ">
                                    <label for="fname" class="col-4 col-form-label text-sm-left">{{ __('First Name') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="fname" type="text"  class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="" required autocomplete="fname" autofocus>

                                        @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="lname" class="col-4 col-form-label text-sm-left">{{ __('Last Name') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="lname" type="text"  class="form-control form-control-sm @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="" required autocomplete="lname" autofocus>

                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="username" class="col-4 col-form-label text-sm-left">{{ __('Username.') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="username" type="text" minlength="8" maxlength="13" class="form-control form-control-sm @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="your username" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="email" class="col-4 col-form-label text-sm-left">{{ __('Email Address') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Must Be Correct Email Address" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="password" class="col-4 col-form-label text-sm-left">{{ __('Password') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="password" type="password" minlength="8" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Minimum Required 8 Charactors" required autocomplete="password" autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="password-confirm" class="col-4 col-form-label text-sm-left">{{ __('Re-type') }} <span class="text-danger"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="password-confirm" type="password" minlength="8" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="Confirm Password (Matched)">

                                        @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="agreement" class="col-4 col-form-label text-sm-left">{{ __('Agreement') }} <span class="text-danger"> *</span></label>

                                    <div class="col-1 ">

                                        <input id="agreement" type="checkbox" class="form-control form-control-sm @error('agreement') is-invalid @enderror" name="agreement" value="1" placeholder="Must Be Correct email Address" required autocomplete="agreement" required>
                                        @error('agreement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                        <small for="shipment_apx_terms" style="color:34495E;"> <span class="text-danger"></span>Agreed to Terms & Conditions.</small>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-8 offset-md-2">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input id="created_by" type="hidden" class="form-control form-control-sm @error('created_by') is-invalid @enderror" name="created_by" value="{{ ('Web Registration') }}" >
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-sm btn-info " type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
</div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    
    $(function() {
        $('#username').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
    });
</script>
@endsection