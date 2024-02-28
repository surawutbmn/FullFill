@extends('layouts.be')
@section('content')
<div id="map" class="map"></div>

<script>
    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([0, 0]),
            zoom: 2
        })
    });

    var marker = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([0, 0]))
    });

    var markerLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [marker]
        })
    });

    map.addLayer(markerLayer);
</script>
@endsection
