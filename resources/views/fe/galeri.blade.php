@extends('fe.app')

@section('title')
AG Kopi - About
@endsection

@section('styles')
<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@endsection

@section('body')
    <body class="main-layout inner_header about_page">
@endsection

@section('header')
    <h2>Galeri</h2>
@endsection

@section('content')
<div class="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="lightbox">
                    <div class="row">
                        @foreach($data as $entry => $datas)
                        <div class="col-lg-4">
                        <input type="hidden" id="eid" name="eid" class="eid" value="{{ $datas->id }}">
                        <img id="myImg"
                            src="{{ asset('file/galeri/' . $datas->gambar) }}"
                            data-mdb-img="{{ asset('file/galeri/' . $datas->gambar) }}"
                            alt="Table Full of Spices"
                            class="w-100 mb-2 mb-md-4 shadow-1-strong rounded"
                        />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>

</script>
@endpush
