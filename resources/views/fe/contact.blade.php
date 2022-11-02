@extends('fe.app')

@section('title')
AG Kopi - Contact
@endsection

@section('styles')
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

@section('body')
    <body class="main-layout inner_header contact_page">
@endsection

@section('header')
    <h2>Contact Us / Forum</h2>
@endsection

@section('content')
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <hr>
                        <h5>Komentar</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('/comment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username">
                                        <p class="text-danger">{{ $errors->first('username') }}</p>
                                    </div>
                                    <div class="form-group" style="display: none" id="formReplyComment">
                                        <label for="">Balas Komentar</label>
                                        <input type="text" id="replyComment" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Komentar</label>
                                        <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-sm">Kirim</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                @foreach ($post as $row)
                                    @if($row->parent_id == null)
                                        <blockquote>
                                            <h6>{{ $row->username }}</h6>
                                            <hr>
                                            <p>{{ $row->comment }}</p><br>
                                            <a href="javascript:void(0)" onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Balas</a>
                                        </blockquote>
                                        @foreach ($row->child as $val)
                                            <div class="child-comment">
                                                <blockquote>
                                                    <h6>{{ $val->username }}</h6>
                                                    <hr>
                                                    <p>{{ $val->comment }}</p><br>
                                                </blockquote>
                                            </div>
                                        @endforeach
                                    @else
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <form id="request" class="main_form">
                    <div class="row">
                    <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name" type="type" name="Name">
                    </div>
                    <div class="col-md-12">
                        <input class="contactus" placeholder="Email" type="type" name="Email">
                    </div>
                    <div class="col-md-12">
                        <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">
                    </div>
                    <div class="col-md-12">
                        <input class="contactus1" placeholder="Message" type="type" Message="Name">
                    </div>
                    <div class="col-md-12">
                        <button class="send_btn">Send</button>
                    </div>
                    </div>
                </form>
            </div> -->
            <div class="col-md-6">
                <div class="map">
                    <figure><img src="images/map_img.png" alt="#"/></figure>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>
        function balasKomentar(id, title) {
            $('#formReplyComment').show();
            $('#parent_id').val(id)
            $('#replyComment').val(title)
        }
    </script>
@endpush
