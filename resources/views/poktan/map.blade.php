@extends('layouts.app')

@section('content')
<div class="container">
    <div id="mapid">
        <div class="card">
            <div class="card-body">
            <x:notify-messages />
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
      #mapid { min-height: 500px; }
    </style>
@endsection

@push('javascript')
 <!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>

<script>

var map = L.map('mapid').setView([{{ config('leafletsetup.map_center_latitude') }},
    {{ config('leafletsetup.map_center_longitude') }}],
    {{ config('leafletsetup.zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
</script>
@endpush
