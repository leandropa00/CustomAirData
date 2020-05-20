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