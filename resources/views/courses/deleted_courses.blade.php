@extends('layouts.back.layout')

@section('title')
Deleted Courses
@endsection

@section('content')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Deleted Courses</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('courses.index') }}">Courses</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Deleted Courses</li>
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
                        <h4 class="card-title">Deleted Courses</h4>
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
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('courses.restore_bulk') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Restore All</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('courses.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                        <hr>
                        <form id="bulk_delete" action="" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all" ></th>
                                            <th>S.No</th>
                                            <th>Course Image</th>
                                            <th>Category Name</th>
                                            <th>Tag Code</th>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Course Price</th>
                                            <th>Featured Status</th>
                                            <th>Course Status</th>
                                            <th>Deleted At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($courses as $course)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $course->id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>
                                                @if($course->course_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <img src="{{ asset('uploads/courses/'.$course->course_image) }}" class="" width="220" height="170">
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $course->category->category_name }}</td>
                                            <td>{{ $course->tag->tag_code }}</td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->course_price }}{{ ' ' }}{{ $course->currency->currency_symbol }}</td>
                                            <td>
                                                @if($course->course_shown == 1)
                                                {{ 'Yes' }}
                                                @elseif($course->course_shown == 0)
                                                {{ 'No' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($course->course_status == 1)
                                                {{ 'Active' }}
                                                @elseif($course->course_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                            <td>{{ $course->deleted_at }}</td>
                                            <td>

                                                <a href="{{ url('courses_restore/'.$course->id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-check"></i> Restore</a>

                                                <a href="" id="{{ $course->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete Permanent</a>
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Course Image</th>
                                            <th>Category Name</th>
                                            <th>Tag Code</th>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Course Price</th>
                                            <th>Featured Status</th>
                                            <th>Course Status</th>
                                            <th>Deleted At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="submit" name="" value="Delete Selected" class="btn btn-sm btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#check_all').change(function(){
        $('.checkItems').prop('checked',$(this).prop('checked'));
    });



    $(document).on('click', '.sa-params', function(e){

        var id = $(this).attr('id');
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'courses_permDelete/'+id,
                    type: 'post',
                    data: '',
                    dataType: 'json'
                })
                .done(function(response){
                    swal('Deleted!', response.message);
                            // $(this).closest('tr').hide();
                            location.reload();
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });

    });

    $("#bulk_delete").submit(function(e){
        e.preventDefault();

        var ids = [];

        $('#zero_config input[type=checkbox]').each(function(){
            if($(this).prop('checked')){
                ids.push($(this).val());
            }
        });

        if(($.inArray('on',ids)) > -1)
        {
            ids.shift();
        }
        swal({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'courses_bulk_permDelete',
                    type: 'POST',
                    data: {ids:ids},
                    dataType: 'json'
                })
                .done(function(response){
                    swal('Deleted!', response.message);
                            // $(this).closest('tr').hide();
                            location.reload();
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });
    });
</script>

@endsection