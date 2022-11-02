@extends('layout.app')

@section('title')
    Artikel | AG-Kopi
@endsection

@section('customcss')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
    <style>
        #mapid { min-height: 500px; width: 100%;}
    </style>
    <link href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
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
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Tambah Kelompok Tani</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('poktan.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-body">
                            <h3 class="box-title">Data Petani Kopi</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" name="place_name" class="form-control @error ('place_name') is-invalid @enderror" placeholder="Place name here...">
                                        @error('place_name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">Luas Lahan</label>
                                    <input type="text" name="luas_lahan" class="form-control @error ('luas_lahan') is-invalid @enderror" placeholder="Masukkan Luas Lahan...">
                                    @error('luas_lahan')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Jumlah Tanaman</label>
                                    <input type="text" name="jumlah_tanaman" class="form-control @error ('jumlah_tanaman') is-invalid @enderror" placeholder="Masukkan Jumlah Tanaman...">
                                    @error('jumlah_tanaman')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Jenis Kopi</label>
                                    <input type="text" name="jenis_kopi" class="form-control @error ('jenis_kopi') is-invalid @enderror" placeholder="Masukkan Jenis Kopi...">
                                    @error('jenis_kopi')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">Jarak Tanam</label>
                                    <input type="text" name="jarak_tanam" class="form-control @error ('jarak_tanam') is-invalid @enderror" placeholder="Masukkan Jarak Tanam...">
                                    @error('luas_lahan')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Waktu Tanam</label>
                                    <div class="input-group">
                                        <input type="text" name="waktu_tanam" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                        <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Produksi</label>
                                    <input type="text" name="produksi" class="form-control @error ('produksi') is-invalid @enderror" placeholder="Masukkan Produksi Kopi...">
                                    @error('jenis_kopi')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Longitude</label>
                                            <input type="text" name="longitude" id="longitude" readonly class="form-control @error ('longitude') is-invalid @enderror" placeholder="longitude">
                                            @error('longitude')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Latitude</label>
                                            <input type="text" name="latitude" id="latitude" readonly class="form-control @error ('latitude') is-invalid @enderror" placeholder="latitude">
                                            @error('latitude')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Address</label>
                                            <textarea name="address" placeholder="Address here..." class="form-control @error ('address') is-invalid @enderror" cols="4" rows="8"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="container" id="mapid"></div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

<!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>
      <script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>
    jQuery('#datepicker-autoclose').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    var mapCenter = [
            {{ config('leafletsetup.map_center_latitude') }},
            {{ config('leafletsetup.map_center_longitude') }},
    ];
    var map = L.map('mapid').setView(mapCenter,{{ config('leafletsetup.zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat,lng){
        marker
        .setLatLng([lat,lng])
        .bindPopup("Your location :" + marker.getLatLng().toString())
        .openPopup();
        return false;
    };
    map.on('click',function(e) {
        let latitude  = e.latlng.lat.toString().substring(0,15);
        let longitude = e.latlng.lng.toString().substring(0,15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude,longitude);
    });
    var updateMarkerByInputs = function () {
        return updateMarker( $('#latitude').val(), $('#longitude').val());
    }
    $('#latitude').on('input',updateMarkerByInputs);
    $('#longitude').on('input',updateMarkerByInputs);
</script>
@endpush
