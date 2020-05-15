<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use Illuminate\Support\Facades\Hash;
use Auth;

class ConfiguracionCuentaController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('configuracionCuenta', compact('user'));
    } 

    public function update(Request $request)
    {
        if (User::withTrashed()->where('email', $request->email)->where('id', '<>', Auth::user()->id)->count() == 0){
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telefono = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('cuenta.edit')->with('success', 'Información de cuenta actualizada correctamente');     

        } else {
            return redirect()->route('cuenta.edit')->with('failed', 'El correo ingresado ya existe');   

        }
    }

    public function fotoEmpresa(Request $request)
    {
        $ruta = '/images/empresas/';
        $file = $request->file('foto');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().$ruta, $name);
        
        $empresa = Empresa::find(Auth::user()->empresa->id);
        $empresa->foto = $name;
        $empresa->save();
        
        return redirect()->route('cuenta.edit')->with('success', 'El logo de tu empresa fue actualizado correctamente');   
    } 
}
