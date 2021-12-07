@extends('layouts.back.layout')

@section('title')
Add Users
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Users</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">My Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Users</li>
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
                    <h4 class="card-title">Add Users</h4>
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
                    <hr>

                    <form class="form-single-submit" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="fname">First Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('fname') is-invalid @enderror" value="{{ old('fname') }}" id="fname" name="fname" placeholder="Enter First name..." required>
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
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('lname') is-invalid @enderror" value="{{ old('lname') }}" id="lname" name="lname" placeholder="Enter Last name..." required>
                                @if($errors->has('lname'))
                                <strong class="text-danger">{{ $errors->first('lname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="username">Username <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" placeholder="Enter username ..." required>
                                @if($errors->has('username'))
                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @endif
                                <small id="presentusr" style="color:red;"></small>
                                <small id="absentusr" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="email">User's Email <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="email" maxlength="254" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter email address..." required>
                                @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password">Passwords <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="password" minlength="8" maxlength="254" class="form-control form-control-sm @error('password') is-invalid @enderror" value="" id="password" name="password" placeholder="password" required>
                                @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="confirm-password">Retype Password <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="password" minlength="8" maxlength="254" class="form-control form-control-sm @error('confirm-password') is-invalid @enderror" value="" id="confirm-password" name="confirm-password" placeholder="Retype password" required>
                                @if($errors->has('confirm-password'))
                                <strong class="text-danger">{{ $errors->first('confirm-password') }}</strong>
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
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_stations" id="submit_stations" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('users.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
    </script>
    @endsection
