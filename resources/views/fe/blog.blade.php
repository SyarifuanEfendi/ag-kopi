@extends('fe.app')

@section('title')
AG Kopi - Artikel
@endsection

@section('body')
    <body class="main-layout inner_header blog_page">
@endsection

@section('header')
    <h2>Artikel</h2>
@endsection

@section('content')
<div class="blog">
    <div class="container">
        <div class="row">
            @foreach($data as $datas)
            <div class="col-md-4">
                <div class="blog_box">
                    <figure><img src="{{ asset('file/artikel/'.$datas->gambar) }}" alt="#"/></figure>
                    <h1>{{ $datas->judul }}</h1>
                    <article><p>
                {!! Str::limit( strip_tags( $datas->isi ), 200 ) !!}
                    </p></article>
                    <br>
                    <a class="read_more" href="{{ url('blog_detail/'.$datas->slug) }}">Read More</a>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-md-4">
                <div class="blog_box">
                    <figure><img src="images/Blog_img2.png" alt="#"/></figure>
                    <h3>Seo marking</h3>
                    <a class="read_more" href="#">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_box">
                    <figure><img src="images/Blog_img3.png" alt="#"/></figure>
                    <h3>Seo marking</h3>
                    <a class="read_more" href="#">Read More</a>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
