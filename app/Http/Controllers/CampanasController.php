<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campana;
use App\Empresa;
use App\User;
use DB;
use Auth;

class CampanasController extends Controller
{ 
    function index()
    {
        $campanas = User::isAdmin() ? Campana::all() : Auth::user()->empresa->campanas;

        return view('campanas.index', compact('campanas'));
    }

    function create()
    {
        $empresas = Empresa::all();
        return view('campanas.crear', compact('empresas'));
    }
    
    function store(Request $request)
    {
        $campana = new Campana;
        $campana->nombre = $request->nombre;
        $campana->empresa_id = $request->empresa_id;
        $campana->fecha_inicio = $request->fecha_inicio;
        $campana->fecha_fin = $request->fecha_fin;
        $campana->observaciones = $request->observaciones;
        $campana->save();
            
        return redirect()->route('campanas.index')->with('success','Campaña creada satisfactoriamente');

    }
    function edit($id)
    {
        $empresas = Empresa::all();
        $campana = Campana::find($id);
        return view('campanas.editar',compact('campana', 'empresas'));
    }
    function update($id, Request $request)
    {
        $campana = Campana::find($id);
        $campana->nombre = $request->nombre;
        $campana->empresa_id = $request->empresa_id;
        $campana->fecha_inicio = $request->fecha_inicio;
        $campana->fecha_fin = $request->fecha_fin;
        $campana->observaciones = $request->observaciones;
        $campana->save();
        return redirect()->route('campanas.index')->with('success','Empresa actualizada satisfactoriamente');

    }
    function destroy($id)
    {
        DB::transaction(function () use ($id){
            Campana::find($id)->puntosDeMonitoreo()->delete();
            Campana::find($id)->delete();
        });
        
        return redirect()->route('campanas.index')->with('success', 'Campaña eliminada satisfactoriamente');
    }
}
