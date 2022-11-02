@extends('layout.app')

@section('title')
    Artikel | AG-KOPI
@endsection

@section('customcss')
    <link href="{{ asset('plugins/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" />

@endsection

@section('header')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Poktan</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
    <ol class="breadcrumb">
        <li><a href="#">Master</a></li>
        <li class="active">Poktan</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel-heading">
            <h4>Kelompok Tani List
                <!-- <a onclick="addForm()" class="btn btn-info pull-right" style="margin-top: -8px;">Add</a> -->
                <!-- <a href="{{ route('poktan.create') }}" class="btn btn-primary btn-sm float-right">Add New Place</a> -->
                @if( Auth::user()->role == 'admin')
                    <a href="{{ route('poktan.create') }}" class="btn btn-info pull-right" style="margin-top: -8px;">Add</a>
                @else
                @endif
            </h4>
        </div>
        <div class="white-box">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alaamat</th>
                            <th>Logitude</th>
                            <th>Latitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas => $entry)
                        <tr>
                            <td>{{ $datas+1 }}</td>
                            <td>{{ $entry->place_name }}</td>
                            <td>{{ $entry->address }}</td>
                            <td>{{ $entry->logitude }}</td>
                            <td>{{ $entry->latitude }}</td>
                            <td>
                                <a href="/poktan/edit/{{ $entry->id }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                @if( Auth::user()->role == 'admin')
                                    <a onclick="deleteData('{{$entry->id}}')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                @else
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
<script>
    $('#isi').summernote({
        height: 400
    });
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
        $('.modal-title').text('Add Artikel');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('artikel') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data_edit) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Artikel');

                $('#id').val(data_edit.id);
                $('#judul').val(data_edit.judul);
                // $('#isi').val(data_edit.isi);
                $("#isi").code(data_edit.isi);
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
                url : "{{ url('poktan') }}" + '/' + id,
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
                if (save_method == 'add') url = "{{ url('artikel') }}";
                else url = "{{ url('artikel') . '/' }}" + id;
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
                            text: 'Format file Harus Image',
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
