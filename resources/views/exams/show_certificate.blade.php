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
                <div class="card mb-5 tst">
                    <div class="card-body printableArea" style="background:url(../uploads/courses/certificate.jpg) no-repeat center center;height:800px;">
                        <div class="panel-body">
                            <div class="row">   
                                <div class="col-md-4 offset-md-6">
                                <div class="m-t-0 font-bold" style="height:200px">
                                </div>
                                    <h1>{{'Conratulation'}}</h1>
                                    <h1>{{$user->fname.' '.$user->lname}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mr-5 mb-3">
                        <button id="print2" class="btn btn-danger btn-outline print_preview" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
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
        });

        $(function() {
            $(".print_preview").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
        $(document).ready(function(){
           // Fetch all records
            $('#but_fetchall').click(function(){
            fetchRecords(0);
               });

               // Search by userid
            $('#but_search').click(function(){
                  var userid = Number($('#search').val().trim());
                        
            if(userid > 0){
                fetchRecords(userid);
              }

            });

        });


    </script>

@endsection

