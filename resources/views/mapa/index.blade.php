@extends('layouts.master')

@section('content')

    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet"/>
    
    <style>
        #map {
            width: 100%;
            height: 600px;
        }

        .mapboxgl-popup {
            max-width: 800px !important;
        }

        .mapboxgl-marker {
            cursor: pointer;
        }

    </style>

    <div class="app-content content">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="gmaps-basic-maps">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Puntos de monitoreo</h4>
                                    <button class="btn btn-info float-right" onclick="centrar()">Centrar</button>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="menu">
                                            <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors" checked="checked"/>
                                            <label for="outdoors-v11">Outdoors&nbsp;&nbsp;&nbsp;</label>
                                            <input id="streets-v11" type="radio" name="rtoggle" value="streets"/>
                                            <label for="streets-v11">Streets&nbsp;&nbsp;&nbsp;</label>
                                            <input id="light-v10" type="radio" name="rtoggle" value="light"/>
                                            <label for="light-v10">Light&nbsp;&nbsp;&nbsp;</label>
                                            <input id="dark-v10" type="radio" name="rtoggle" value="dark"/>
                                            <label for="dark-v10">Dark&nbsp;&nbsp;&nbsp;</label>
                                            <input id="satellite-v9" type="radio" name="rtoggle" value="satellite"/>
                                            <label for="satellite-v9">Satellite&nbsp;&nbsp;&nbsp;</label>
                                        </div>
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibGVhbmRyb3BhMDAiLCJhIjoiY2thaDU2Z3N6MGc0bTJxcG5xOGJrODZ5diJ9.ELYLOz9iGjkOCPbXY7DIVA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/outdoors-v11',
            center: [-74.2443, 4.2707],
            zoom: 7
        });

        var puntos = [];

        @forelse ($puntos as $item)

            puntos.push([{{ $item->longitud }}, {{ $item->latitud }}]);

            var marker = new mapboxgl.Marker()
            .setLngLat([{{ $item->longitud }}, {{ $item->latitud }}])
            .setPopup(
                new mapboxgl.Popup(
                    {
                        anchor: 'center',
                        closeButton: false
                    }
                ).on('open', function(){
                    map.flyTo({
                        center: [{{ $item->longitud }}, {{ $item->latitud }}]
                    });
                })
                .setHTML(html({{$item->id}}))
            )
            .addTo(map);
        @empty
        @endforelse    

        centrar();      

        function centrar() {
            map.fitBounds(puntos, {
                padding: {top: 100, bottom:100, left: 100, right: 100}
            });     
        } 

        function html(id) {
            var html;
            var url = "{{ route('mapChart', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                async: false,
                type: "get",
                url: url,
                success: function (res) {
                    html = res;   
                }
            });

            return html;
        }

        function get_chart(loc_id,val,conv){
            var url = "{{route('graficar', [':id', ':val', ':conv'])}}";
            url = url.replace(':id', loc_id);
            url = url.replace(':val', val);
            url = url.replace(':conv', conv);

            $('#crtifrm').attr('src', url);   
        }

        var layerList = document.getElementById('menu');
        var inputs = layerList.getElementsByTagName('input');
        
        function switchLayer(layer) {
            var layerId = layer.target.id;
            map.setStyle('mapbox://styles/mapbox/' + layerId);
        }
        
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].onclick = switchLayer;
        }
    </script>
@endsection 
