@extends('layout.app')

@section('title')
    File | AG-KOPI
@endsection

@section('customcss')
    <link href="{{ asset('plugins/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" />

@endsection

@section('header')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">File</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
    <ol class="breadcrumb">
        <li><a href="#">Master</a></li>
        <li class="active">File</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel-heading">
            <h4>File List
                <a onclick="addForm()" class="btn btn-info pull-right" style="margin-top: -8px;">Add</a>
            </h4>
        </div>
        <div class="white-box">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas => $entry)
                        <tr>
                            <td>{{ $datas+1 }}</td>
                            <td>{{ $entry->nama }}</td>
                            <td>{{ $entry->deskripsi }}</td>
                            <!-- <td><img src="{{ asset('file/pdf/' . $entry->file) }}" width="150"/></td> -->
                            <td>
                                <a onclick="deleteData('{{$entry->id}}')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-1 control-label">File</label>
                        <div class="col-md-11">
                            <input type="file" name="file" id="file" multiple class="form-control" accept="*">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-1 control-label">Nama File</label>
                        <div class="col-md-11">
                            <input type="text" name="nama" id="nama" class="form-control" >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-1 control-label">Deskripsi</label>
                        <div class="col-md-11">
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
<script>
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add File');
    }


    function deleteData(id){
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            $.ajax({
                url : "{{ url('Allfile') }}" + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', "_token": "{{ csrf_token() }}",},
                success : function(data) {
                    swal("Good job!", data.message, "success").then(function(){
                        location.reload();
                    });
                },
                error : function (data) {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
    }

    $(function(){
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('Allfile') }}";
                else url = "{{ url('Allfile') . '/' }}" + id;
                $.ajax({
                    url : url,
                    type : "POST",
                    enctype: 'multipart/form-data',
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modal-form form')[0].reset();
                        swal("Good job!", data.message, "success").then(function(){
                            location.reload();
                        });
                    },
                    error : function(data){
                        swal({
                            title: 'Oops...',
                            text: 'Size Terlalu Besar',
                            type: 'error'
                        })
                    }
                });
                return false;
            }
        });
    });
    </script>
@endpush
