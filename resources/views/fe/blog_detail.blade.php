@extends('fe.app')

@section('title')
AG Kopi - Detail Artikel
@endsection

@section('body')
    <body class="main-layout inner_header blog_page">
@endsection

@section('header')
    <h2>Detail Artikel</h2>
@endsection

@section('content')
<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- the actual blog post: title/author/date/content -->
                <h1><a href="">{{ $data->judul }}</a></h1>
                <p class="lead"><i class="fa fa-user"></i> by <a href="">Admin</a>
                </p>
                <hr>
                <p><i class="fa fa-calendar"></i>

                Posted on <?php $coba = strtotime($data->created_at); echo date('d F Y, h:i:s A', $coba); ?></p>
                <!-- <p><i class="fa fa-tags"></i> Tags: <a href=""><span class="badge badge-info">Bootstrap</span></a> <a href=""><span class="badge badge-info">Web</span></a> <a href=""><span class="badge badge-info">CSS</span></a> <a href=""><span class="badge badge-info">HTML</span></a></p> -->

                <hr>
                <img src="{{ asset('file/artikel/'.$data->gambar) }}" class="img-responsive">
                <hr>
                    {!! $data->isi !!}
                <br/>
            </div>
        </div>
    </div>
</div>

@endsection
