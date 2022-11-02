@extends('fe.app')

@section('title')
AG Kopi - Mapping
@endsection

@section('body')
<body class="main-layout inner_header service_page">
@endsection

@section('header')
    <h2>Gis</h2>
@endsection

@section('content')
<div class="services">
    <div class="container">
        <div class="row">
            <div id="mapid">
                <div class="card">
                    <div class="card-body"></div>
                    <x:notify-messages />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<!-- Leaflet CSS -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
      <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">

    <style>
      #mapid { min-height: 500px; width: 100%; }
    </style>
@endsection

@push('javascript')
 <!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

var map = L.map('mapid').setView([{{ config('leafletsetup.map_center_latitude') }},
    {{ config('leafletsetup.map_center_longitude') }}],
    {{ config('leafletsetup.zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    axios.get('{{ route('api.poktan.index') }}')
    .then(function (response) {
        //console.log(response.data);
        L.geoJSON(response.data,{
            pointToLayer: function(geoJsonPoint,latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function(layer) {
            //return layer.feature.properties.map_popup_content;
            return ('<div class="my-2"><strong>Nama</strong> :<br>'+layer.feature.properties.place_name+'</div> <div class="my-2"><strong>Luas Lahan</strong>:<br>'+layer.feature.properties.luas_lahan+'</div> <div class="my-2"><strong>Jumlah Tanaman</strong>:<br>'+layer.feature.properties.jumlah_tanaman+'</div> <div class="my-2"><strong>Jenis Kopi</strong>:<br>'+layer.feature.properties.jenis_kopi+'</div><div class="my-2"><strong>Jarak Tanam</strong>:<br>'+layer.feature.properties.jarak_tanam+'</div><div class="my-2"><strong>Waktu Tanam</strong>:<br>'+layer.feature.properties.waktu_tanam+'</div><div class="my-2"><strong>Produksi</strong>:<br>'+layer.feature.properties.produksi+'</div>');
        }).addTo(map);
        console.log(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });

</script>
@endpush
