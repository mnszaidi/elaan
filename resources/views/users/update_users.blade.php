@extends('layouts.back.layout')

@section('title')
Edit or Activate User
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit or Activate User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit or Activate User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Form -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit or Activate User</h4>
                    <hr>
                    <div class="row">
                            <div class="col-12">
                                @if(session('gmsg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  {{ session('gmsg') }}.
                                </div>
                                @elseif(session('bmsg'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  {{ session('bmsg') }}.
                                </div>
                                @elseif(session('dmsg'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  {{ session('dmsg') }}.
                                </div>
                                @elseif(session('imsg'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  {{ session('imsg') }}.
                                </div>
                                @endif
                            </div>
                        </div>
                    <form class="form-single-submit" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="fname">First Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ $user->fname }}" required>
                                @if($errors->has('fname'))
                                <strong class="text-danger">{{ $errors->first('fname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="lname">Last Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ $user->lname }}" required>
                                @if($errors->has('lname'))
                                <strong class="text-danger">{{ $errors->first('lname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="email">Email Address <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                                @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="username">username <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}" required>
                                @if($errors->has('username'))
                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password_option">Password Option <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="password_option" class="form-control form-control-sm @error('username') is-invalid @enderror" id="password_option" required>
                                    <option value="">Select Password Option</option>
                                    <option value="1">Change Password</option>
                                    <option value="0">Dont Change Password</option>
                                    @if($errors->has('password_option'))
                                    <strong class="text-danger">{{ $errors->first('password_option') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password">New Password <span class="text-danger"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="password" autofocus disabled>
                                @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password-confirm">Confirm Password <span class="text-danger"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" disabled>
                                @if($errors->has('password-confirm'))
                                <strong class="text-danger">{{ $errors->first('password-confirm') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="roles">Role Name  <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="form-control form-control-sm @error('roles') is-invalid @enderror" id="roles" name="roles">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}"@if($role->name == $user->roles[0]->name){{ 'selected' }}@endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <small id="usercompany" style="color:red;">All Sterik Fields are required.</small>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_type" id="submit_type" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('users.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Form -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
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

        $('#password_option').change(function(){
            var val = $(this).val();
            if(val == '1')
            {
                $('#password').prop('disabled',false);
                $('#password').prop('required',true);
                $('#password').val('');
                $('#password-confirm').prop('disabled',false);
                $('#password-confirm').prop('required',true);
                $('#password-confirm').val('');
            }else{
                $('#password').prop('disabled',true);
                $('#password').prop('required',false);
                $('#password-confirm').prop('disabled',true);
                $('#password-confirm').prop('required',false);
            }
        });
    </script>
    @endsection