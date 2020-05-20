<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{"$cantidad archivos cargados satisfactoriamente"}} 
</div>

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