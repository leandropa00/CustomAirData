<link rel="stylesheet" href="{{asset('dropzone/dist/dropzone.css')}}">

<div class="card">
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4>Archivos cargados</h4>
        </div>
    </div>
    <div class="card-body" style="max-height: 200px; overflow: auto" id="tabla">
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

            this.on("success", function (file, response) {
                $.ajax({
                    type: "get",
                    url: "{{route('puntos-monitoreo.recargarTablaDatos', $punto->id)}}",
                    success: function (response) {
                        $('#tabla').html(response);                        
                    }
                });
            })
        },

    });
</script>
