@extends('layouts.back.layout_auth')

@section('title')
Show Exam Result
@endsection

@section('content')
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../back/dist/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @foreach($batches as $key => $batch)
                            @if($key == 0)
                                <h2 class="card-title">Result For : {{ $batch->course_title }}</h2>
                            @endif
                        @endforeach
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                        <div>
                                            @foreach($batches as $batch)
                                            <h4 class="card-title">Question : {{$batch->question}} </h4>
                                            <h6 class="card-title">Your Answer : {{$batch->answer}} </h6>
                                                @if($batch->answer_status == 1)
                                                    <h6 class="card-title text-success">Correct Answer  =  10 Points</h6>
                                                @else
                                                    <h6 class="card-title text-danger">Wrong Answer = 0 Poitns</h6>
                                                @endif

                                            <hr>
                                            @endforeach
                                        </div>
                                    <h6 class="card-title">20 Numbers of Assignment will be Approved After Manual Vaidation.</h6>
                                </div>
                            </div>
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

