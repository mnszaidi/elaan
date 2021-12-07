@extends('layouts.back.layout')

@section('title')
Add Assignment
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Assignment</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('assignments.index') }}">Assignment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Assignment</li>
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
                    <h4 class="card-title">Add Assignment</h4>
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
                    <form class="form-single-submit" action="{{ route('assignments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_id">Select Course<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="course_id" class="form-control form-control-sm @error('course_id') is-invalid @enderror" id="course_id" required>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                <strong class="text-danger">{{ $errors->first('course_id') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_code">Assignment Code <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('assignment_code') is-invalid @enderror" value="{{ old('assignment_code') }}" id="assignment_code" name="assignment_code" placeholder="Enter Assignment code..." required>
                                @if($errors->has('assignment_code'))
                                <strong class="text-danger">{{ $errors->first('assignment_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_name">Assignment Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('assignment_name') is-invalid @enderror" value="{{ old('assignment_name') }}" id="assignment_name" name="assignment_name" placeholder="Enter Assignment name..." required>
                                @if($errors->has('assignment_name'))
                                <strong class="text-danger">{{ $errors->first('assignment_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_title">Assignment Title <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('assignment_title') is-invalid @enderror" value="{{ old('assignment_title') }}" id="assignment_title" name="assignment_title" placeholder="Enter Assignment Title..." required>
                                @if($errors->has('assignment_title'))
                                <strong class="text-danger">{{ $errors->first('assignment_title') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_description">Assignment Description <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" rows="7" id="assignment_description" name="assignment_description" value="{{ old('assignment_description') }}" placeholder="Enter Assignment Description..." required></textarea>
                                @if($errors->has('assignment_description'))
                                <strong class="text-danger">{{ $errors->first('assignment_description') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_summary">Assignment Summery <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" rows="3" id="assignment_summary" name="assignment_summary" value="{{ old('assignment_summary') }}" placeholder="Enter Assignment Summery..." required></textarea>
                                @if($errors->has('assignment_summary'))
                                <strong class="text-danger">{{ $errors->first('assignment_summary') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="assignment_status">Assignment Status <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="assignment_status" class="form-control form-control-sm @error('assignment_status') is-invalid @enderror" id="assignment_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('assignment_status'))
                                    <strong class="text-danger">{{ $errors->first('assignment_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_assignments" id="submit_assignments" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('assignments.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
            $('#assignment_code').keyup(function(){
            var assignment_code = $(this).val();
            var id_lenght= assignment_code.toString().length;
            if(id_lenght>3){
            $.ajax({
            type: "POST",
            url: "{{route('check.assignments')}}",
            data: {'assignment_code':assignment_code},
            dataType: 'json',
            success : function(data) {
            if(data.assignment_code)
                 {
                     $('#presentreg').html('Opss.!..Assignment Code Already Exist');
                     $('#absentreg').html('');
                 }else{

                    $('#absentreg').html('Congrats!..Assignment Code is Available.');
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
