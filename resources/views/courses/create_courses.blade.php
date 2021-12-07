@extends('layouts.back.layout')

@section('title')
Add Course
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Course</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('courses.index') }}">Course</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Course</li>
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
                    <h4 class="card-title">Add Course</h4>
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
                    <form class="form-single-submit" action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="category_id">Select Category<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="category_id" class="form-control form-control-sm @error('category_id') is-invalid @enderror" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="tag_id">Select Tag<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="tag_id" class="form-control form-control-sm @error('tag_id') is-invalid @enderror" id="tag_id" required>
                                    <option value="">Select Tag</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tag_id'))
                                <strong class="text-danger">{{ $errors->first('tag_id') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_code">Course Code <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('course_code') is-invalid @enderror" value="{{ old('course_code') }}" id="course_code" name="course_code" placeholder="Enter Course code..." required>
                                @if($errors->has('course_code'))
                                <strong class="text-danger">{{ $errors->first('course_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_name">Course Name <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('course_name') is-invalid @enderror" value="{{ old('course_name') }}" id="course_name" name="course_name" placeholder="Enter Course name..." required>
                                @if($errors->has('course_name'))
                                <strong class="text-danger">{{ $errors->first('course_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_title">Course Title <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('course_title') is-invalid @enderror" value="{{ old('course_title') }}" id="course_title" name="course_title" placeholder="Enter Course title..." required>
                                @if($errors->has('course_title'))
                                <strong class="text-danger">{{ $errors->first('course_title') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_summary">Course Summery <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" rows="3" id="course_summary" name="course_summary" value="{{ old('course_summary') }}" placeholder="Enter Course Summery..." required></textarea>
                                @if($errors->has('course_summary'))
                                <strong class="text-danger">{{ $errors->first('course_summary') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_description">Course Description <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" rows="7" id="course_description" name="course_description" value="{{ old('course_description') }}" placeholder="Enter Course Description..." required></textarea>
                                @if($errors->has('course_description'))
                                <strong class="text-danger">{{ $errors->first('course_description') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_price">Course price <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('course_price') is-invalid @enderror" value="{{ old('course_price') }}" id="course_price" name="course_price" placeholder="Enter Course price..." required>
                                @if($errors->has('course_price'))
                                <strong class="text-danger">{{ $errors->first('course_price') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-2 mb-3">
                                <select name="currency_id" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" id="currency_id" required>
                                    <option value="">Select Symbol</option>
                                    @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->currency_symbol }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('currency_id'))
                                <strong class="text-danger">{{ $errors->first('currency_id') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_image">Course Featured Image<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" name="course_image" id="course_image" onchange="loadPreview(this);" class="form-control form-control-sm @error('course_image') is-invalid @enderror" required multiple>
                
                                @if($errors->has('course_image'))
                                <strong class="text-danger">{{ $errors->first('course_image') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="image_preview">Preview Image<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <img id="preview_img" src="{{ asset('uploads/no_image.png') }}" class="" width="200" height="190">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_shown">Shown on Main <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="course_shown" class="form-control form-control-sm @error('course_shown') is-invalid @enderror" id="course_shown" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @if($errors->has('course_shown'))
                                    <strong class="text-danger">{{ $errors->first('course_shown') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_status">Course Status <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="course_status" class="form-control form-control-sm @error('course_status') is-invalid @enderror" id="course_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('course_status'))
                                    <strong class="text-danger">{{ $errors->first('course_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_courses" id="submit_courses" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('courses.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
            $('#course_code').keyup(function(){
            var course_code = $(this).val();
            var id_lenght= course_code.toString().length;
            if(id_lenght>3){
            $.ajax({
            type: "POST",
            url: "{{route('check.courses')}}",
            data: {'course_code':course_code},
            dataType: 'json',
            success : function(data) {
            if(data.course_code)
                 {
                     $('#presentreg').html('Opss.!..Course Code Already Exist');
                     $('#absentreg').html('');
                 }else{

                    $('#absentreg').html('Congrats!..Course Code is Available.');
                    $('#presentreg').html('');
                }
            },
            error: function(response) {
                alert(response.responseJSON.message);
                    }
                });
            }
        });

        function loadPreview(input, id) {
        id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
         
                reader.onload = function (e) {
                    $(id)
                            .attr('src', e.target.result)
                            .width(220)
                            .height(170);
                };
         
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endsection
