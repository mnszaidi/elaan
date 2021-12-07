@extends('layouts.back.layout')

@section('title')
Edit Question
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Question</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('questions.index') }}">Question</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Question</li>
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
                    <h4 class="card-title">Edit Question</h4>
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
                    <form class="form-single-submit" action="{{ route('questions.update', $question->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="course_id">Select Course<span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="course_id" class="form-control form-control-sm @error('course_id') is-invalid @enderror" id="course_id" required>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"@if($course->id == $question->course_id){{ 'selected' }}@endif>{{ $course->course_title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                <strong class="text-danger">{{ $errors->first('course_id') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="question">Question <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="254" class="form-control form-control-sm @error('question') is-invalid @enderror" id="question" name="question" value="{{ $question->question }}" required>
                                @if($errors->has('question'))
                                <strong class="text-danger">{{ $errors->first('question') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            @foreach($answers as $answer)
                            <div class="col-8">
                                <div class="row">
                                    <p hidden="true" id="box_count">1</p>
                                    <div class="col-md-2">
                                        <label for="shipment_time">Answer: <span class="text-danger"> *</span></label>
                                    </div>
                                    <div class="col-1">
                                        <small for="answer_no" style="color:black;">NO<span style="color:red"> *</span></small>
                                        <input type="text"  name="answer_no[]" value="{{ $answer->answer_no }}" class="form-control form-control-sm @error('answer_no') is-invalid @enderror" readonly>
                                        @if($errors->has('answer_no'))
                                            <strong class="text-danger">{{ $errors->first('answer_no') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <small for="answer" style="color:black;">ANSWER<span style="color:red"> *</span></small>
                                        <input type="text"  name="answer[]" value="{{ $answer->answer }}" class="form-control form-control-sm @error('answer') is-invalid @enderror" required>
                                        @if($errors->has('answer'))
                                            <strong class="text-danger">{{ $errors->first('answer') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <small for="answer_status" style="color:black;">CORRECT?<span style="color:red">*</span></small>
                                        <select name="answer_status[]" class="form-control form-control-sm @error('answer_status') is-invalid @enderror" id="answer_status" required>
                                            <option value="">Select</option>
                                            <option value="1"@if($answer->answer_status == 1){{ 'selected' }}@endif>Yes</option>
                                            <option value="0"@if($answer->answer_status == 0){{ 'selected' }}@endif>No</option>
                                        </select>
                                        @if($errors->has('answer_status'))
                                            <strong class="text-danger">{{ $errors->first('answer_status') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="question_status">Question Status <span class="text-danger"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="question_status" class="form-control form-control-sm @error('question_status') is-invalid @enderror" id="question_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($question->question_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($question->question_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('question_status'))
                                    <strong class="text-danger">{{ $errors->first('question_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_question" id="submit_question" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('questions.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#question_code').keyup(function(){
        var question_code = $(this).val();
        var id_lenght= question_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.questions')}}",
        data: {'question_code':question_code},
        dataType: 'json',
        success : function(data) {
        if(data.question_code)
             {
                 $('#presentreg').html('Opss.!..Question Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Question Code is Available.');
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
