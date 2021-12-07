@extends('layouts.back.layout_auth')

@section('content')
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../back/dist/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Take Exam For Course: {{$course->course_title}}</h4>
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <span class="card-title">Select one answer from Below Options</span><br>
                                    <small class="card-title">Each Question Holds 10 Marks</small><br>
                                    <small class="card-title">Assigment Task is For  Holds 20 Marks</small>
                                </div>
                            </div>
                        <hr>
                        <div class="panel-body">
                            <!--<form  action="{{ route('exams.exams_submt') }}" class="tab-wizard vertical wizard-circle mt-5" method="post" enctype="multipart/form-data">-->
                            <form action="{{ route('exams.exams_submt') }}" class="validation-wizard vertical wizard-circle m-t-40" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Step 1 -->
                                @foreach($questions as $question)
                                <h6>{{$question->question}}</h6>
                                    <input type="text"  name="course_title[]" value="{{ $course->course_title }}" class="form-control form-control-sm @error('course_title') is-invalid @enderror" hidden>
                                    <input type="text"  name="question[]" value="{{ $question->question }}" class="form-control form-control-sm @error('question') is-invalid @enderror" hidden>
                                <section>
                                    @foreach($question->answers as $answer)
                                        <div class="col-md-8 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="answer[]" id="{{$answer->answer}}" value="{{$answer->answer}}" required>
                                                <label class="form-check-label" for="answer">{{$answer->answer}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                </section>
                                @endforeach
                                @if($assignments)
                                    @foreach($assignments as $assignment)
                                    <h6>{{$assignment->assignment_title}}</h6>
                                    <section>
                                        <h6>{{$assignment->assignment_title}}</h6>
                                        <input type="text" name="assignment_title[]" value="{{ $assignment->assignment_title }}" class="form-control form-control-sm @error('$assignment->assignment_title') is-invalid @enderror" hidden>
                                    <hr>
                                        <p>{{$assignment->assignment_description}}</p>
                                    <hr>
                                    <p>{{$assignment->assignment_summary}}</p>
                                    <hr>
                                    <small for="assignment_file">Assignment<span class="text-danger"> *</span></small>
                                        <input type="file" accept="pdf/*" name="assignment_file[]" id="assignment_file" class="form-control border border-dark form-control-sm @error('assignment_file') is-invalid @enderror" required>
                                    <label for="assignment_file">Attach and Upload Assignment</label><br>
                                    <small id="absent_assignment_file" class="text-danger"></small>
                                    <hr>
                                    </section>
                                    @endforeach
                                @endif
                            </form>
                           <hr>
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
    <script type="text/javascript">
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });$("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true
    });

    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });

    // Advance Example

    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });

    // Dynamic Manipulation
    $("#example-manipulation").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        enablePagination: false
    });

    //Vertical Steps

    $("#example-vertical").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical"
    });

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex) {
            swal("Exam Submitted!", "Kindly Wait!... It will Create result");

        }
    });


    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            $(".validation-wizard").submit();
            swal("Form Submitted!", "Kindly Wait!... It will Create result");
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    });

    $("#assignment_file").change(function () {
        var fileExtension = ['pdf','ppt','docf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            //alert("Only formats are allowed : "+fileExtension.join(', '));
            $('#absent_assignment_file').html("Only formats are allowed : "+fileExtension.join(', '));
            $('#assignment_file').val('');
        }else{
            $('#absent_assignment_file').html('');
        }
    });
    

    $("#exam_form").validate({
        rules: {
            "answer[]": "required"
        },
        messages: {
            "answer[]": "Please select an Answer",
        }
    });

    $("#exam_form").validate({
        rules: {
            "assignment_file[]": "required"
        },
        messages: {
            "assignment_file[]": "Please Upload Project",
        }
    });

       // $(document).on('mouseleave',function(e){
       //      e.preventDefault();
       //      swal({
       //          title: 'Are you sure?',
       //          text: "You can not Leave Exam, Please Stay on the Page",
       //          type: 'warning',
       //          showCancelButton: true,
       //          confirmButtonColor: '#ff9f1f',
       //          cancelButtonColor: '#3085d6',
       //          confirmButtonText: 'Yes, Exit it!',
       //          showLoaderOnConfirm: true,
       //          preConfirm: function() {
       //            return new Promise(function(resolve) {
       //              $.ajax({
       //                  url: "",
       //                  type: 'GET',
       //                  data: '',
       //                  dataType: ''
       //              })
       //              .done(function(response){
       //                  swal('Important!', 'You Leaving Exam Incomplete');
                                
       //                         window.location = "{{ route('welcome') }}";
       //                      })
       //              .fail(function(){
       //                  swal('Oops...', 'Something went wrong  !', 'error');
       //              });
       //          });
       //        },
       //        allowOutsideClick: false
       //    });
       //  });

    </script>

@endsection
