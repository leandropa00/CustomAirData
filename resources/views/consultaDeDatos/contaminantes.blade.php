<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12">
            <h4 class="card-title">Contaminantes</h4>
        </div>
        
        <div class="form-group col-md-2 col-6">
            <fieldset class="checkbox">
                <div class="vs-checkbox-con vs-checkbox-secondary">
                    <input id="all_checkbox" type="checkbox" name="all" value="1">
                    <span class="vs-checkbox">
                        <span class="vs-checkbox--check">
                            <i class="vs-icon feather icon-check"></i>
                        </span>
                    </span>
                    <span>Todos</span>
                </div>
            </fieldset>
        </div>
        
        @forelse ($contaminantes as $item)
            <div class="form-group col-md-2 col-6">
                <fieldset class="checkbox">
                    <div class="vs-checkbox-con vs-checkbox-primary">
                        <input class="checkbox_contaminantes" type="checkbox" value="{{$item->id}}" name="contaminantes[]">
                        <span class="vs-checkbox">
                            <span class="vs-checkbox--check">
                                <i class="vs-icon feather icon-check"></i>
                            </span>
                        </span>
                        <span>{{strtoupper($item->nombre)}}</span>
                    </div>
                </fieldset>
            </div>
        @empty
        @endforelse
    </div>
</div>

<script>
    $('#all_checkbox').change(function () { 
        if($(this).is(':checked')) {
            $('.checkbox_contaminantes').prop('checked', true);
        } else {
            $('.checkbox_contaminantes').prop('checked', false);
        }
    });
</script>