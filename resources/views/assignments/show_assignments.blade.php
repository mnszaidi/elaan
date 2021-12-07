@extends('layouts.back.layout')

@section('title')
Show Assignment
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Assignment</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
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
                        <h4 class="card-title">Show Assignment</h4>
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
                            <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Course Name</th>
                                        <td>{{ $assignment->course->course_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Assignment Code</th>
                                        <td>{{ $assignment->assignment_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Assignment Name</th>
                                        <td>{{ $assignment->assignment_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Assignment Title</th>
                                        <td>{{ $assignment->assignment_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Description</th>
                                        <td>{{ $assignment->assignment_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Course Summery</th>
                                        <td>{{ $assignment->assignment_summary }}</td>
                                    </tr>
                                    <tr>
                                        <th>Assignment Status</th>
                                        <td>
                                            @if($assignment->assignment_status == 1)
                                            {{ 'Active' }}
                                            @elseif($assignment->assignment_status == 0)
                                            {{ 'Disabled' }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $assignment->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $assignment->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('assignments.edit', $assignment->id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit Assignment</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('assignments.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
