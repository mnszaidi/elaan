@extends('layouts.back.layout')

@section('title')
Show Course
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Course</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Course</li>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Show Course</h4>
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
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered table-sm m-b-0">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Course Code</th>
                                        <td>
                                            @if($course->course_image)
                                            <div class="el-card-avatar el-overlay-1">
                                                <img src="{{ asset('uploads/courses/'.$course->course_image) }}" class="" width="220" height="170">
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>{{ $course->category->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tag Code</th>
                                        <td>{{ $course->tag->tag_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Code</th>
                                        <td>{{ $course->course_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Name</th>
                                        <td>{{ $course->course_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Title</th>
                                        <td>{{ $course->course_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Summery</th>
                                        <td>{{ $course->course_summary }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Description</th>
                                        <td>{{ $course->course_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Price</th>
                                        <td>{{ $course->course_price }}{{ ' ' }}{{ $course->currency->currency_symbol }}</td>
                                    </tr>
                                    <tr>
                                        <th>Featured Course</th>
                                        <td>
                                            @if($course->course_shown == 1)
                                            {{ 'Yes' }}
                                            @elseif($course->course_shown == 0)
                                            {{ 'No' }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Course Status</th>
                                        <td>
                                            @if($course->course_status == 1)
                                            {{ 'Active' }}
                                            @elseif($course->course_status == 0)
                                            {{ 'Disabled' }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $course->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $course->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <label for="question">Questions and Answers <span class="text-danger"> </span></label>
                        <hr>
                        <div class="row">
                            @foreach($questions as $question)
                            <div class="col-12">
                                <h4>{{ $question->question }}</h4>
                                    @foreach($question->answers as $answer)
                                        @if($answer->answer_status == 1)
                                            <span class="label label-success">{{$answer->answer}}</span>
                                        @else
                                            <span class="label label-warning">{{$answer->answer}}</span>
                                        @endif
                                    @endforeach
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <button id="add_shipment_status" type="button" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#myModal">
                                  Add Questions 
                                </button>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('courses.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="exampleModalcomments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Shipment Comments</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-single-submit" action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-9 mb-3">
                                            <input type="text"  maxlength="254" class="form-control form-control-sm @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="{{ $course->id }}" hidden>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <label for="question">Question <span class="text-danger"> *</span></label>
                                        </div>
                                        <div class="col-md-10 mb-3">
                                            <input type="text"  maxlength="254" class="form-control form-control-sm @error('question') is-invalid @enderror" value="{{ old('question') }}" id="shipment_awb3" name="question" required>
                                            @if($errors->has('question'))
                                            <strong class="text-danger">{{ $errors->first('question') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <p hidden="true" id="box_count">1</p>
                                                <div class="col-md-2">
                                                    <label for="shipment_time">Answer: <span class="text-danger"> *</span></label>
                                                </div>
                                                <div class="col-1">
                                                    <small for="answer_no" style="color:black;">NO<span style="color:red"> *</span></small>
                                                    <input value="1" type="text"  name="answer_no[]" class="form-control form-control-sm @error('answer_no') is-invalid @enderror" readonly>
                                                    @if($errors->has('answer_no'))
                                                        <strong class="text-danger">{{ $errors->first('answer_no') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    <small for="answer" style="color:black;">ANSWER<span style="color:red"> *</span></small>
                                                    <input value="{{ old('answer') }}" type="text"  name="answer[]" class="form-control form-control-sm @error('answer') is-invalid @enderror" required>
                                                    @if($errors->has('answer'))
                                                        <strong class="text-danger">{{ $errors->first('answer') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <small for="answer_status" style="color:black;">CORRECT?<span style="color:red">*</span></small>
                                                    <select name="answer_status[]" class="form-control form-control-sm @error('answer_status') is-invalid @enderror" id="answer_status" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    @if($errors->has('answer_status'))
                                                        <strong class="text-danger">{{ $errors->first('answer_status') }}</strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="weight_fields" class=" m-t-5"></div>
                                            <div class="row">
                                                <div class="col-10 pt-1 pb-1">
                                                </div>
                                                <div id="add_weight_button_div" class="col-2 pt-4 pb-1">
                                                    <button class="btn btn-success btn-sm" type="button" onclick="weight_fields();"><i class="fa fa-plus"></i> Add Fields</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="submit_answer" id="submit_answer" value="1">
                                            <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#" data-dismiss="modal" class="btn btn-block btn-sm btn-secondary " type="button">Close</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var room2 = 1;
        function weight_fields() {
            ++room2;
            document.getElementById('box_count').innerHTML = room2;
            var ccount = $('#box_count').val();
            var objTo = document.getElementById('weight_fields');
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeWeightClass" + room2);
            var rdiv = 'removeWeightClass' + room2;
            divtest.innerHTML = '<div class="row"><p id="box_count' + room2 + '"></p><div class="col-md-2"><label for="shipment_time">Answer: <span class="text-danger"> *</span></label></div><div class="col-1"><small for="answer_no" style="color:black;">NO<span style="color:red">*</span></small><input value="' + room2 +'" type="text"  id="answer_no' + room2 +'" name="answer_no[]" class="form-control form-control-sm" readonly required> </div> <div class="col-6"><small for="answer" style="color:black;">ANSWER<span style="color:red"> *</span></small> <input type="text"  id="answer' + room2 +'" name="answer[]" class="form-control form-control-sm" required> </div> <div class="col-md-2"><small for="answer_status" style="color:black;">CORRECT?<span style="color:red">*</span></small><select name="answer_status[]" class="form-control form-control-sm" id="answer_status' + room2 +'" required><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div>  <div class="col-1 pt-4 pb-1"> <button hidden="true" id="remove_weight' + room2 + '" class="btn btn-danger btn-sm" type="button" onclick="remove_weight_fields(' + room2 + ');"> <i class="fa fa-minus"></i> </button> </div></div></div>';

            objTo.appendChild(divtest)

            show_minus_button(room2);
        }

        function show_minus_button(rid) {

            $('#remove_weight' + room2).attr('hidden', false);
            while(rid > 0){
            rid--;
            $('#remove_weight'+ rid).attr('hidden', true);
            }
        }

        function remove_weight_fields(rid) {

            $('.removeWeightClass' + rid).remove();
            --room2;
            $('#remove_weight' + room2).attr('hidden', false);
            document.getElementById('box_count').innerHTML = room2;
        }

        function weight_checking() {

            var test=document.getElementById('box_count').innerHTML;
            test = test? test:1;
            var sel = document.getElementById('item_box');
            var opt = null;
            $('#item_box option').remove();

           for(i = 1; i < parseInt(test)+1; i++) { 
                opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = i;
                sel.appendChild(opt);
            }
        }

        $('#add_shipment_status').click(function(){
            $("#exampleModalcomments").modal();
        });
    </script>
    @endsection
