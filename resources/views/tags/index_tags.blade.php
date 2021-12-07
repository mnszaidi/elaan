@extends('layouts.back.layout')

@section('title')
Tags List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Tags</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tags</li>
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
                        <h4 class="card-title">Tags</h4>
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
                                <a href="{{ route('tags.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add Tag</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('tags.upload_page') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Upload Tags</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="#" id="tags_export" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Export Tags</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('tags.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Tags</a>
                            </div>
                        </div>
                        <hr>
                        
                        <form id="bulk_delete" action="" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all" name=""></th>
                                            <th>S.No</th>
                                            <th>Tag Code</th>
                                            <th>Tag Name</th>
                                            <th>Tag Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($tags as $tag)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $tag->id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>{{ $tag->tag_code }}</td>
                                            <td>{{ $tag->tag_name }}</td>
                                            <td>
                                                @if($tag->tag_status == 1)
                                                {{ 'Active' }}
                                                @elseif($tag->tag_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                            <td>{{ $tag->created_at }}</td>
                                            <td>{{ $tag->created_by }}</td>
                                            <td>{{ $tag->updated_at }}</td>
                                            <td>{{ $tag->updated_by }}</td>

                                            <td>

                                                <a href="{{ route('tags.show', $tag->id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> View</a>

                                                <a href="{{ route('tags.edit', $tag->id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>

                                                <a href="" id="{{ $tag->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Tag Code</th>
                                            <th>Tag Name</th>
                                            <th>Tag Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="submit" name="" value="Delete Selected" class="btn-single-submit btn btn-sm btn-danger">
                            </form>
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

    $(document).on('click', '#tags_export', function(e){
        var country_Id = $(this).attr('id');
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "It Export Below Data in Excel Format",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff9f1f',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Export it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    url: "",
                    type: 'GET',
                    data: '',
                    dataType: ''
                })
                .done(function(response){
                    swal('Exported!', response.message);
                            // $(this).closest('tr').hide();
                           window.location = "{{ route('tags.export_csv') }}";
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });

    });

    $(document).on('click', '.sa-params', function(e){

        var id = $(this).attr('id');
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: "It will be deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'tags/'+id,
                    type: 'DELETE',
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
            text: "It will be deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'tags_bulk_delete',
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
