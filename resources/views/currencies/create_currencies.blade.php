@extends('layouts.back.layout')

@section('title')
Add Currency
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Currency</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('currencies.index') }}">Currency</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Currency</li>
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
                    <h4 class="card-title">Add Currency</h4>
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
                    <form class="form-single-submit" action="{{ route('currencies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="currency_code">Currency Code <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('currency_code') is-invalid @enderror" value="{{ old('currency_code') }}" id="currency_code" name="currency_code" placeholder="Enter Currency code..." required>
                                @if($errors->has('currency_code'))
                                <strong class="text-danger">{{ $errors->first('currency_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="currency_name">Currency Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('currency_name') is-invalid @enderror" value="{{ old('currency_name') }}" id="currency_name" name="currency_name" placeholder="Enter Currency name..." required>
                                @if($errors->has('currency_name'))
                                <strong class="text-danger">{{ $errors->first('currency_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="currency_symbol">Currency Symbol <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('currency_symbol') is-invalid @enderror" value="{{ old('currency_symbol') }}" id="currency_symbol" name="currency_symbol" placeholder="Enter Currency Symbol..." required>
                                @if($errors->has('currency_symbol'))
                                <strong class="text-danger">{{ $errors->first('currency_symbol') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="currency_status">Currency Status <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="currency_status" class="form-control form-control-sm @error('currency_status') is-invalid @enderror" id="currency_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('currency_status'))
                                    <strong class="text-danger">{{ $errors->first('currency_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_currencies" id="submit_currencies" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('currencies.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
            $('#currency_code').keyup(function(){
            var currency_code = $(this).val();
            var id_lenght= currency_code.toString().length;
            if(id_lenght>3){
            $.ajax({
            type: "POST",
            url: "{{route('check.currencies')}}",
            data: {'currency_code':currency_code},
            dataType: 'json',
            success : function(data) {
            if(data.currency_code)
                 {
                     $('#presentreg').html('Opss.!..Currency Code Already Exist');
                     $('#absentreg').html('');
                 }else{

                    $('#absentreg').html('Congrats!..Currency Code is Available.');
                    $('#presentreg').html('');
                }
            },
            error: function(response) {
                alert(response.responseJSON.message);
                    }
                });
            }
        });
    </script>
    @endsection
