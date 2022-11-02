@extends('fe.app')

@section('title')
AG Kopi - About
@endsection

@section('body')
    <body class="main-layout inner_header blog_page">
@endsection

@section('header')
    <h2>File</h2>
@endsection

@section('content')
<div class="team">
    <div class="container">
            <div class="row">
                @foreach($data as $datas)
                    <div class="col-md-6">
                        <div class="blog_box">
                            <figure>
                            <iframe src="{{ asset('file/pdf/'. $datas->file) }}#page=1" height="320" width="100%" padding-left="10px" frameborder="0" scrolling="auto" allowfullscreen></iframe>
                            </figure>
                            <h1>{{ $datas-> nama }}</h1>
                            <article><p>
                            {{ $datas->deskripsi }}
                            </p></article>
                            <br>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12">
                
                </div>

            </div>
    </div>
</div>
@endsection
@push('javascript')

@endpush
