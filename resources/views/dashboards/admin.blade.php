@extends('layouts.back.layout')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Welcome {{ Auth::user()->fname }}</h4>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== 
        <div class="row">
            <!-- column 
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Booked Today</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Cash in Bank</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Total Balance</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Total Expected Amount</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--<div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted"> Active Accounts</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Societies</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Sectors</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Streets</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Society Plots</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Allocated Plots</span>
                                <div class="text-muted"><a href="#" target="">Add More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Members</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Plans</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Society Files</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">0</h3>
                                <span class="text-muted">Schedules</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Allocation Files</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Transfers</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Staff</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Dealers</span>
                                <div class="text-muted"><a href="#" target="">Add New</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Paid Insts</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Unpaid Insts</span>
                                <div class="text-muted"><a href="#" target="">Check All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">1</h3>
                                <span class="text-muted">Payment Reciepts</span>
                                <div class="text-muted"><a href="#" target="">Collect Payment</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="font-light m-b-5">99</h3>
                                <span class="text-muted">Darft SMS</span>
                                <div class="text-muted"><a href="#" target="">Send Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Files -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Files -->
        <!-- ============================================================== -->
    </div>
@endsection

