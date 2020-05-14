<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function manual_upload()
    {
        return view('cargaManual');
    }

    public function fileUploadPost(Request $request)
    
    {
        $request->validate([
            'file' => 'required|mimes:txt|max:2048',
        ]);
     
        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('datos'), $fileName);
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file', $fileName);
    }

}

