<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function clientes(){

        return view('clientes.index');
    }
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
    public function layoutClientes()
    {
        return response()->view("clientes.layout.clientes")->header('Content-Type', 'text/xml');
    }
    public function dataClientes()
    {
        $clientes = Cliente::where('status','!=','X')->get();
        $data = ["clientes"=>$clientes];
        return response()->view("clientes.data.clientes",$data)->header('Content-Type', 'text/xml');
    }

    public function saveClientes(Request $request)
    {
        $POST =$_POST;
        $A = array();
        $XML = array_key_exists("TGData", $POST) ? $POST["TGData"] : (array_key_exists("Data", $POST) ? $POST["Data"] : "");
        $cambios ="";
        if($XML){
            if (get_magic_quotes_gpc()) {
                $XML = stripslashes($XML);
            }
            $SXML = is_callable("simplexml_load_string");

            if ($SXML) {
                $Xml = simplexml_load_string(html_entity_decode($XML));
                $AI = $Xml->Changes->I;

            }else {
                $Xml = CreateXmlFromString(html_entity_decode($XML));
                $AI = $Xml->getElementsByTagName($Xml->documentElement, "I");
            }

            foreach($AI as $I){
                $A = $SXML ? $I->attributes() : $Xml->attributes[$I];
                if(!empty($A["Deleted"])){
                    $int = Cliente::find($A["id"]);
                    $int->estado='X';
                    $int->update();
                } else if(!empty($A["Added"])){
                    $cli = Cliente::create(['nombre' => $A["nombre"],
                        'ruc' => $A["ruc"],
                        'telefono' => $A["telefono"],
                        'correo' => $A["correo"],
                        'contacto' => $A["contacto"],
                        'observaciones' => $A["observaciones"],
                        'status' =>'A'
                    ]);
                    $cambios.= "<I id='".$A["id"]."' NewId='".$cli->id."' codigo='".$cli->id."' Changed='1'/>";
                }else if(!empty($A["Changed"])){
                    $cli = Cliente::find($A["id"]);
                    if(isset($A["nombre"]))
                        $cli->nombre = ($A["nombre"]);
                     if(isset($A["telefono"]))
                        $cli->telefono = ($A["telefono"]);
                     if(isset($A["ruc"]))
                        $cli->ruc = ($A["ruc"]);
                     if(isset($A["correo"]))
                        $cli->correo = ($A["correo"]);
                     if(isset($A["contacto"]))
                        $cli->contacto = ($A["contacto"]);
                     if(isset($A["observaciones"]))
                        $cli->observaciones = ($A["observaciones"]);
                     if(isset($A["status"]))
                        $cli->status = ($A["status"]);
                    $cli->update();
                }
            }
        }
        echo '<Grid>';
        echo '<Changes>';
        echo '<IO Result="0" Message="La información ha sido grabada" />'.$cambios;
        echo '</Changes>';
        echo '</Grid>';
    }
}
