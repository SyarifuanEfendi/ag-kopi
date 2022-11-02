@extends('fe.app')

@section('title')
AG Kopi - About
@endsection

@section('body')
    <body class="main-layout inner_header blog_page">
@endsection

@section('header')
    <h2>Video</h2>
@endsection

@section('content')
<div class="team">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-4">
                <div class="blog_box">
                    <figure>
                        <video width="100%" height="240" controls>
                            <source src="{{ asset('video/Video1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </figure>
                    <h1>Video 1</h1>
                    <article><p>
                    RENCANA AKSI PERUBAHAN PELATIHAN KEPEMIMPINAN ADMINISTRATOR ANGKATAN XXI
                    </p></article>
                    <br>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_box">
                    <figure>
                        <video width="100%" height="240" controls>
                            <source src="{{ asset('video/Video1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </figure>
                    <h1>Video 2</h1>
                    <article><p>
                    RENCANA AKSI PERUBAHAN PELATIHAN KEPEMIMPINAN ADMINISTRATOR ANGKATAN XXI
                    </p></article>
                    <br>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_box">
                    <figure>
                        <video width="100%" height="240" controls>
                            <source src="{{ asset('video/Video1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </figure>
                    <h1>Video 3</h1>
                    <article><p>
                    RENCANA AKSI PERUBAHAN PELATIHAN KEPEMIMPINAN ADMINISTRATOR ANGKATAN XXI
                    </p></article>
                    <br>
                </div>
            </div> -->
            @foreach($data as $datas)
            <div class="col-md-4">
            <x-embed url="{{ $datas->link }}" aspect-ratio="16:9" />
                    <p>
                    <!-- RENCANA AKSI PERUBAHAN PELATIHAN KEPEMIMPINAN ADMINISTRATOR ANGKATAN XXI <br><br> -->
                    <!-- <iframe width="420" height="315" src="{{ $datas->link }}" frameborder="0" allowfullscreen></iframe> -->
                    <!-- <video width="500" height="240" controls>
                        <source src="{{ $datas->link }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
