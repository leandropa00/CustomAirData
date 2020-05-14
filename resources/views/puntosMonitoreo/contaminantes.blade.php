@extends('layouts.master')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    @if ($message = Session::get('failed'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class="form form-vertical" action="{{ route('puntos-monitoreo.guardar_rangos', $puntoMonitoreo) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <h4 class="card-title">Seleccione los rangos de los contaminantes para el punto de monitoreo {{ $puntoMonitoreo->alias }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @forelse ($puntoMonitoreo->contaminantes as $item)
                                                <div class="form-group col-md-4 col-6">
                                                    <div class="text-center">
                                                        <label>{{strtoupper($item->nombre)}} ({{ $item->unidad_final }})</label>
                                                    </div>
                                                    <input type="hidden" name="contaminantes[]" value="{{ $item->id }}">
                                                    <div class="row form-group">
                                                        <div class="col-md-6 col-6">
                                                            <input type="number" step="any" class="form-control" name="min[]" placeholder="Valor mínimo" value="{{ $item->pivot->minimo }}">
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <input type="number" step="any" class="form-control" name="max[]" placeholder="Valor máximo" value="{{ $item->pivot->maximo }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
@endsection