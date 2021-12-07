@extends('layouts.back.layout')

@section('title')
Add Tag
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Tag</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('tags.index') }}">Tag</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Tag</li>
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
                    <h4 class="card-title">Add Tag</h4>
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
                    <form class="form-single-submit" action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="tag_code">Tag Code <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('tag_code') is-invalid @enderror" value="{{ old('tag_code') }}" id="tag_code" name="tag_code" placeholder="Enter Tag code..." required>
                                @if($errors->has('tag_code'))
                                <strong class="text-danger">{{ $errors->first('tag_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="tag_name">Tag Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('tag_name') is-invalid @enderror" value="{{ old('tag_name') }}" id="tag_name" name="tag_name" placeholder="Enter Tag name..." required>
                                @if($errors->has('tag_name'))
                                <strong class="text-danger">{{ $errors->first('tag_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="tag_status">Tag Status <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="tag_status" class="form-control form-control-sm @error('tag_status') is-invalid @enderror" id="tag_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('tag_status'))
                                    <strong class="text-danger">{{ $errors->first('tag_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_tags" id="submit_tags" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('tags.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
            $('#tag_code').keyup(function(){
            var tag_code = $(this).val();
            var id_lenght= tag_code.toString().length;
            if(id_lenght>3){
            $.ajax({
            type: "POST",
            url: "{{route('check.tags')}}",
            data: {'tag_code':tag_code},
            dataType: 'json',
            success : function(data) {
            if(data.tag_code)
                 {
                     $('#presentreg').html('Opss.!..Tag Code Already Exist');
                     $('#absentreg').html('');
                 }else{

                    $('#absentreg').html('Congrats!..Tag Code is Available.');
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
