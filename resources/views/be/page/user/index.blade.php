@extends('layout.app')

@section('title')
    Users | AG-KOPI
@endsection

@section('customcss')

@endsection

@section('header')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Users</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
    <ol class="breadcrumb">
        <li><a href="#">Master</a></li>
        <li class="active">Users</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel-heading">
            <h4>Users List
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
                            <th>username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas => $entry)
                        <tr>
                            <td>{{ $datas+1 }}</td>
                            <td>{{ $entry->name }}</td>
                            <td>{{ $entry->username }}</td>
                            <td>{{ $entry->role }}</td>
                            <td>
                                <a onclick="editForm('{{$entry->id}}')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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

<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
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
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="col-md-3 control-label">Username</label>
                      <div class="col-md-6">
                          <input type="text" id="username" name="username" class="form-control" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="col-md-3 control-label">User Level</label>
                        <div class="col-md-6">
                            <select id="role" name="role" class="form-control">
                                <option value="admin">Administrator</option>
                                <option value="editor">User</option>
                            </select>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add User');
    }
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('admin') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data_edit) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit User');

                $('#id').val(data_edit.id);
                $('#name').val(data_edit.name);
                $('#username').val(data_edit.username);
                $('#role').val(data_edit.role);
            },
            error : function() {
                alert("Nothing Data euyy...!!");
            }
        });
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
                url : "{{ url('admin') }}" + '/' + id,
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
                if (save_method == 'add') url = "{{ url('admin') }}";
                else url = "{{ url('admin') . '/' }}" + id;
                console.log(new FormData($("#modal-form form")[0]));
                $.ajax({
                    url : url,
                    type : "POST",
                    enctype: 'multipart/form-data',
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modal-form form')[0].reset();
                        if (data.success == true) {
                            swal("Good job!", data.message, "success").then(function(){
                                location.reload();
                            });
                        }else{
                            swal("Oops...", data.message, "error").then(function(){
                                location.reload();
                            });
                        }
                    },
                    error : function(data){
                        swal({
                            title: 'Oops...',
                            text: data,
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
