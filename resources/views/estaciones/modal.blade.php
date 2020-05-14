@forelse ($estacion->puntosDeMonitoreo as $item)
    <div class="row">
        <div class="col-12 form-group">
            <label>Punto de monitoreo: </label>
            {{$item->alias}}
        </div>
        <div class="col-12 form-group">
            <label>Latitud: </label>
            {{$item->latitud}}
        </div>
        <div class="col-12 form-group">
            <label>Longitud: </label>
            {{$item->longitud}}
        </div>
        <div class="col-12 form-group">
            <label>Campaña: </label>
            {{$item->campana->nombre}}
        </div>
        <div class="col-12 form-group">
            <label>Empresa: </label>
            {{$item->campana->empresa->nombre}}
        </div>
        <div class="col-12 form-group">
            <label>Fecha de creación del punto: </label>
            {{carbon\Carbon::parse($item->created_at)->format('d-m-Y g:i A')}}
        </div>
    </div>
    <hr>
@empty
    
@endforelse