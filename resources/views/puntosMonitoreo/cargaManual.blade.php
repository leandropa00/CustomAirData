<link rel="stylesheet" href="{{asset('dropzone/dist/dropzone.css')}}">

<div class="alert alert-success" id="alerta" style="display: none">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Datos cargados correctamente a la base de datos
</div>

<div id="tabla">
    <div class="card">
        <div class="card-header text-center">
            <div class="col-12 text-center">
                <h4>{{'Archivos cargados ('.count($archivos).')'}}</h4>
            </div>
        </div>
        <div class="card-body" style="max-height: 200px; overflow: auto">
            <table class="table table-striped">
                @forelse ($archivos as $item)
                    <tr>
                        <td class="text-center">
                            {{$item}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center">
                            No hay datos para este punto de monitoreo
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4>Sube un nuevo archivo</h4>
        </div>
    </div>
    <div class="card-body">
        <form class="dropzone dropzone needsclick dz-clickable" id="dropzone-form">
            @csrf
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>
    </div>
</div>


<div class="card" id="carga" @if (empty($archivos)) style="display: none" @endif>
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4>Carga tus archivos a la base de datos</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="col-12 text-center">
            <button class="btn btn-info" id="cargarBD">Cargar</button>
        </div>
    </div>
</div>


<script src="{{asset('dropzone/dist/dropzone.js')}}"></script>
<script>
    $("#dropzone-form").dropzone({
        url: "{{route('puntos-monitoreo.cargaDatos', $punto->id)}}",
        dictDefaultMessage: "Arrastra tus archivos .dat aquí", 
        maxFilesize: 1,
        accept: function(file, done) {
            if (file.name.length == 12 && file.name.substr(-4,4) == '.dat') {
                done();           
            } else {
                done("Sólo se aceptan archivos .dat");                
            }
            this.on("complete", function (file, response) {
                var url = "{{route('puntos-monitoreo.recargarTablaDatos', [$punto->id, ':i'])}}"
                url = url.replace(':i', this.getAcceptedFiles().length);

                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        $('#tabla').html(response);  
                        $('#carga').show();
                    }
                });
            })
        },
    });
    
    $('#cargarBD').click(function () { 
        $.ajax({
            type: "get",
            url: "{{route('puntos-monitoreo.cargaDatosBD', $punto->id)}}",
            success: function (response) {
                $('#alerta').show();
            }
        });        
    });
</script>
