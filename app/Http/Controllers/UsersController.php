<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{ 
    public function index()
    {
        $users_data = User::isAdmin() ? User::where('rol', 'not like', 'admin')->get() : Auth::user()->empresa->usuarios()->where('rol', 'usuario')->get();

        return view('usuarios.index',compact('users_data'));
    } 

    public function create()
    {
        $empresas = Empresa::all();
        return view('usuarios.crear', compact('empresas'));
    }

    public function store(Request $request)
    {
        if (User::withTrashed()->where('email', $request->email)->count() == 0){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telefono = $request->phone;
            $user->password = Hash::make($request->password);
            $user->empresa_id = $request->empresa;
            $user->rol = 'usuario';
            $user->save();

            return redirect()->route('users.index')->with('success','Cliente creado satisfactoriamente');     

        } else {
            return redirect()->route('users.create')->with('failed','El correo ingresado ya existe');   

        }
    }

    public function edit($id)
    {
        $edit_user = User::find($id);
        $empresas = Empresa::all();

        return view('usuarios.editar',compact('edit_user', 'empresas'));       
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->empresa_id = $request->empresa;
        $user->telefono = $request->phone;
        $user->save();

        return redirect()->route('users.index')->with('success','Cliente actualizado satisfactoriamente');  
    } 

    function destroy($id){
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','Usuario eliminado satisfactoriamente');    
    }

    function permisosSms(User $user, Request $request){
        $user->recibe_mensajes = $request->permiso;
        $user->save();        
    }
}
