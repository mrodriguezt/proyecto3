<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function crearCliente(Request $request){
        
        $ruc = $request["ruc"];
        $nombreCliente = $request["nombreCliente"];
        $telefonoCliente = $request["telefonoCliente"];
        $correoCliente = $request["correoCliente"];
        $contactoCliente = $request["contactoCliente"];

        Cliente::create([
            'ruc' => $ruc,
            'nombre' => $nombreCliente,
            'telefono' => $telefonoCliente,
            'correo' => $correoCliente,
            'contacto' => $contactoCliente,
            'status' => 'A'
        ])->save();

    }
}
