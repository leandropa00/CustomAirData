<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\User;
use Illuminate\Support\Facades\Hash;

class ContrasenaController extends Controller
{
    function enviarMensaje(Request $request){
        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) == 1){
            $client = new Client('ACc85a8a7ca720a26c0d94ad2acf9e0100', 'dc31ed7b6d3a1750aff31dc9d2f3da86');
            $client->messages->create(
                '+57'.$user->telefono, 
                [ 
                    'from' => '+16692013141',
                    'body' => 'Tu codigo de verificacion es '.$request->codigo
                ]
            );

            echo 'success';
            
        } else   
            echo 'error';
    }

    function cambiarContrasena(Request $request){

        $user = User::whereEmail($request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->back()->withErrors(['success' => 'Contraseña actualizada satisfactoriamente. Intenta ingresar de nuevo al sistema con tu nueva contraseña.']);  
    }
}
