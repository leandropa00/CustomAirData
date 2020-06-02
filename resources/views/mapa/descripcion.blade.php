@if ($ultimoDato)
    <div class="row" style="background-color: #f8f8f8; border-radius: 10px">
        <div class="col-12 col-md-12">
            <h5 class="h_heading">&nbsp;&nbsp;{{strtoupper($punto->alias)}} - {{strtoupper($campana->nombre)}} - Último dato: {{ carbon\Carbon::parse($ultimoDato->fecha_hora)->format('d/m/Y g:i A') }}</h5>
        </div>   
        <div class="col-12 col-md-3">
            <table class="table" width="100%" style="background: #f8f8f8; color: black; margin-left:10px">
                <tbody>
                    @forelse ($contaminantes as $item)
                        <tr style="background-color:
                            @php
                                $total = $ultimoDato[$item->nombre_campo] == '' ? '0.00' : round(($ultimoDato[$item->nombre_campo] * $item->conversion), 2);
                                echo color($total, $item->nombre_campo);
                            @endphp
                            " onclick="get_chart({{$punto->id}},'{{$item->nombre_campo}}', '{{$item->conversion}}');" data-toggle="tooltip" title="Ver {{$item->nombre}}">
                            <td style="padding: 0px"> 
                                <b>{{$item->nombre}}</b> 
                            </td>
                            <td style="padding: 0px"> 
                                <b>{{ $total.' '.$item->unidad_final }}</b>
                            </td>
                        </tr>
                    @empty
                        <br>
                        <p style="color:red; margin-left:10px">¡Sin contaminantes!<br>Por favor verifica los datos del punto de monitoreo.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12 col-md-9">
            <iframe src="{{ route('graficar', [$punto->id, $contaminantes[0]->nombre_campo, $contaminantes[0]->conversion]) }}" frameBorder="0" id="crtifrm" style="background-color: #f8f8f8; width:95%; height:100%;"></iframe>
        </div>
    </div>
@else
<br>
<div class="row" style="background-color: #f8f8f8; border-radius: 10px">
    <div class="col-12 col-md-12">
        <p style="color:red; margin-left:10px">&nbsp;<br>¡Sin datos!<br>El punto de monitoreo se encuentra inactivo.</p>
    </div>   
</div>   
@endif

@php
    function color($total, $campo) {
        if ($campo == 'o3'){
            if ($total >= 0 && $total < 117) return 'rgb(0,180,0)';
            elseif ($total >= 117 && $total < 148) return 'rgb(255,255,0)';
            elseif ($total >= 148 && $total < 188) return 'rgb(255,126,0)';
            elseif ($total >= 188 && $total < 227) return 'rgb(255,0,0)';
            elseif ($total >= 227 && $total < 735) return 'rgb(153,0,76)';
            elseif ($total >= 735 && $total <= 1184) return 'rgb(126,0,35)';
        } elseif($campo == 'pm10'){
            if ($total >= 0 && $total < 55) return 'rgb(0,180,0)';
            elseif ($total >= 55 && $total < 155) return 'rgb(255,255,0)';
            elseif ($total >= 155 && $total < 255) return 'rgb(255,126,0)';
            elseif ($total >= 255 && $total < 355) return 'rgb(255,0,0)';
            elseif ($total >= 355 && $total < 424) return 'rgb(153,0,76)';
            elseif ($total >= 424 && $total <= 604) return 'rgb(126,0,35)';
        } elseif($campo == 'pm25'){
            if ($total >= 0 && $total < 15.5) return 'rgb(0,180,0)';
            elseif ($total >= 15.5 && $total < 40.5) return 'rgb(255,255,0)';
            elseif ($total >= 40.5 && $total < 65.5) return 'rgb(255,126,0)';
            elseif ($total >= 65.5 && $total < 150.5) return 'rgb(255,0,0)';
            elseif ($total >= 150.5 && $total < 250.5) return 'rgb(153,0,76)';
            elseif ($total >= 250.5 && $total <= 500.4) return 'rgb(126,0,35)';
        } elseif($campo == 'co'){
            if ($total >= 0 && $total < 5.2) return 'rgb(0,180,0)';
            elseif ($total >= 5.2 && $total < 11) return 'rgb(255,255,0)';
            elseif ($total >= 11 && $total < 14.4) return 'rgb(255,126,0)';
            elseif ($total >= 14.4 && $total < 17.9) return 'rgb(255,0,0)';
            elseif ($total >= 17.9 && $total < 35.1) return 'rgb(153,0,76)';
            elseif ($total >= 35.1 && $total <= 58) return 'rgb(126,0,35)';
        } elseif($campo == 'so2'){
            if ($total >= 0 && $total < 91) return 'rgb(0,180,0)';
            elseif ($total >= 91 && $total < 379) return 'rgb(255,255,0)';
            elseif ($total >= 379 && $total < 587.6) return 'rgb(255,126,0)';
            elseif ($total >= 587.6 && $total < 797.6) return 'rgb(255,0,0)';
            elseif ($total >= 797.6 && $total < 1583.6) return 'rgb(153,0,76)';
            elseif ($total >= 1583.6 && $total <= 2631) return 'rgb(126,0,35)';
        } elseif($campo == 'no2'){
            if ($total >= 0 && $total < 101) return 'rgb(0,180,0)';
            elseif ($total >= 101 && $total < 189) return 'rgb(255,255,0)';
            elseif ($total >= 189 && $total < 678) return 'rgb(255,126,0)';
            elseif ($total >= 678 && $total < 1221) return 'rgb(255,0,0)';
            elseif ($total >= 1221 && $total < 2350) return 'rgb(153,0,76)';
            elseif ($total >= 2350 && $total <= 3852) return 'rgb(126,0,35)';
        }
    }
@endphp