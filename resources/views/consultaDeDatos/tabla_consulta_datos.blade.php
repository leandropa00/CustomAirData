<div class="card">
    <div class="card-body card-dashboard">
        <div class="col-12">
            <h4 class="card-title">Datos</h4>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped dataex-html5-selectors" id="table">
                <thead>
                    <tr>
                        <th colspan="{{count($contaminantes)+2}}" class="text-center">{{$punto->alias.' - '.$punto->campana->nombre.' - '.$punto->campana->empresa->nombre}}</th>
                    </tr>
                    <tr>
                        <th>DÍA</th>
                        <th>HORA</th>
                        @forelse ($contaminantes as $item)
                            <th>{{"$item->nombre ($item->unidad_inicial)"}}</th>
                        @empty
                        @endforelse
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>