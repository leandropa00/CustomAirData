<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacion;

class EstacionesController extends Controller
{
    public function index()
    {
        $estaciones = Estacion::all();
        return view('estaciones.index',compact('estaciones'));
    } 

    public function create()
    {
        return view('estaciones.crear');
    }

    public function store(Request $request)
    {
        $estacion = new Estacion;
        $estacion->nombre = $request->nombre;
        $estacion->serial = $request->serial;
        $estacion->modelo = $request->modelo;
        $estacion->fecha_compra = $request->fecha_compra;
        $estacion->observaciones = $request->observaciones;
        $estacion->save();
            
        return redirect()->route('estaciones.index')->with('success','Estación creada satisfactoriamente');  
    } 

    public function edit($id)
    {
        $estacion = Estacion::find($id);
        return view('estaciones.editar',compact('estacion'));       
    }

    public function update($id, Request $request)
    {
        $estacion = Estacion::find($id);
        $estacion->nombre = $request->nombre;
        $estacion->serial = $request->serial;
        $estacion->modelo = $request->modelo;
        $estacion->fecha_compra = $request->fecha_compra;
        $estacion->observaciones = $request->observaciones;
        $estacion->save();

        return redirect()->route('estaciones.index')->with('success','Estación actualizada satisfactoriamente');  
    } 

    public function destroy($id)
    {
        Estacion::find($id)->delete();
        return redirect()->route('estaciones.index')->with('success','Estación eliminada satisfactoriamente');    
    }

}
