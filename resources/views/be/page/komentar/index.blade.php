@extends('layout.app')

@section('title')
    Artikel | AG-KOPI
@endsection

@section('customcss')
    <link href="{{ asset('plugins/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" />
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        blockquote p {
            display: inline;
            font-style: italic;
        }
        blockquote h6 {
            font-weight: 700;
            padding: 0;
            margin: 0 0 .25rem;
        }
        .child-comment {
            padding-left: 50px;
        }
    </style>
@endsection

@section('header')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Komentar</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
    <ol class="breadcrumb">
        <li><a href="#">Master</a></li>
        <li class="active">Komentar</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel-heading">
            <h4>Komentar List
            </h4>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="white-box">
                    <!-- <div class="col-md-6"> -->
                        @foreach ($post as $row)
                            @if($row->parent_id == null)
                                <blockquote>
                                    <h6>{{ $row->username }} <a onclick="deleteData('{{$row->id}}')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></h6>
                                    <hr>
                                    <p>{{ $row->comment }}</p><br>
                                </blockquote>
                                @foreach ($row->child as $val)
                                    <div class="child-comment">
                                        <blockquote>
                                            <h6>{{ $val->username }} <a onclick="deleteData('{{$val->id}}')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a> </h6>
                                            <hr>
                                            <p>{{ $val->comment }}</p><br>
                                        </blockquote>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        @endforeach
                    <!-- </div> -->
                </div>
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
                url : "{{ url('komentar') }}" + '/' + id,
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
    </script>
@endpush
