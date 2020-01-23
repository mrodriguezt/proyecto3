<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Inteligencia;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class InteligenciaController extends Controller
{
    public function inteligencia()
    {

        $paises = Pais::select('id as value','nombre as label')->where('status','A')->orderBy('nombre')->get()->pluck('label','value');
        return view('inteligencia.index')->with('paises',$paises);
    }
    public function layoutInteligencia()
    {
        $pais = Pais::where('status','A')->get();
        $nP = array();
        $cP = array();
        foreach ($pais as $p){
            array_push($cP,$p->id);
            array_push($nP,$p->nombre);
        }
        $nPaises = implode("|",$nP);
        $cPaises = implode("|",$cP);

        $clientes = Cliente::where('status','A')->orderBy('nombre')->get();

        $nC = array();
        $cC = array();
        foreach ($clientes as $n){
            array_push($cC,$n->id);
            array_push($nC,$n->nombre);
        }
        $nClientes = implode("|",$nC);
        $cClientes = implode("|",$cC);
        $data = ["nPaises"=>$nPaises,"cPaises"=>$cPaises,"nClientes"=>$nClientes,"cClientes"=>$cClientes];
        return response()->view("inteligencia.layout.inteligencia",$data)->header('Content-Type', 'text/xml');
    }
    public function dataInteligencia()
    {
        $inteligencias = Inteligencia::where('estado','!=','X')->get();

        $data = ["inteligencias"=>$inteligencias];
        return response()->view("inteligencia.data.inteligencia",$data)->header('Content-Type', 'text/xml');
    }

    public function saveInteligencia(Request $request)
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
                    $int = Inteligencia::find($A["id"]);
                    $int->estado='X';
                    $int->update();
                } else if(!empty($A["Added"])){
                    $int = Inteligencia::create(['nombre_tercero' => $A["nombre_tercero"],
                        'fecha' => date('Y-m-d',strtotime($A["fecha"])),
                        'fecha_seguimiento' => date('Y-m-d',strtotime($A["fecha_seguimiento"])),
                        'tipo_contacto' => $A["tipo_contacto"],
                        'publico' => $A["publico"],
                        'privado' => $A["privado"],
                        'formato_contacto' => $A["formato_contacto"],
                        'contactos_clave' => $A["contactos_clave"],
                        'asistentes' => $A["asistentes"],
                        'involucrados_scmi' => $A["involucrados_scmi"],
                        'proposito' => $A["proposito"],
                        'proposito_otro' => $A["proposito_otro"],
                        'pais' => $A["pais"],
                        'ciudad' => $A["ciudad"],
                        'industria' => $A["industria"],
                        'sub_industria' => $A["sub_industria"],
                        'pais_interes' => $A["pais_interes"],
                        'detalle_contacto' => $A["detalle_contacto"],
                        'requiere_seguimiento' => $A["requiere_seguimiento"],
                        'usuario_modifica' =>Auth::user()->username,
                        'usuario_ingreso' =>Auth::user()->username
                    ]);
                    $cambios.= "<I id='".$A["id"]."' NewId='".$int->id."' codigo='".$int->id."' Changed='1'/>";
                }else if(!empty($A["Changed"])){
                    $int = Inteligencia::find($A["id"]);
                    if(isset($A["fecha"]))
                        $int->fecha = date('Y-m-d',strtotime($A["fecha"]));
                    if(isset($A["nombre_tercero"]))
                        $int->nombre_tercero = ($A["nombre_tercero"]);
                    if(isset($A["tipo_contacto"]))
                        $int->tipo_contacto = ($A["tipo_contacto"]);
                    if(isset($A["publico"]))
                        $int->publico = ($A["publico"]);
                    if(isset($A["formato_contacto"]))
                        $int->formato_contacto = ($A["formato_contacto"]);
                    if(isset($A["contactos_clave"]))
                        $int->contactos_clave = ($A["contactos_clave"]);
                    if(isset($A["asistentes"]))
                        $int->asistentes = ($A["asistentes"]);
                    if(isset($A["involucrados_scmi"]))
                        $int->involucrados_scmi = ($A["involucrados_scmi"]);
                    if(isset($A["proposito"]))
                        $int->proposito = ($A["proposito"]);
                    if(isset($A["proposito_otro"]))
                        $int->proposito_otro = ($A["proposito_otro"]);
                    if(isset($A["pais"]))
                        $int->pais = ($A["pais"]);
                    if(isset($A["ciudad"]))
                        $int->ciudad = ($A["ciudad"]);
                    if(isset($A["ubicacion"]))
                        $int->ubicacion = ($A["ubicacion"]);
                    if(isset($A["industria"]))
                        $int->industria = ($A["industria"]);
                    if(isset($A["sub_industria"]))
                        $int->sub_industria = ($A["sub_industria"]);
                    if(isset($A["pais_interes"]))
                        $int->pais_interes = ($A["pais_interes"]);
                    if(isset($A["detalle_contacto"]))
                        $int->detalle_contacto = ($A["detalle_contacto"]);
                    if(isset($A["requiere_seguimiento"]))
                        $int->requiere_seguimiento = ($A["requiere_seguimiento"]);
                    if(isset($A["requerimiento_seguimiento"]))
                        $int->requerimiento_seguimiento = ($A["requerimiento_seguimiento"]);
                    if(isset($A["fecha_seguimiento"]))
                        $int->fecha_seguimiento = date('Y-m-d',strtotime($A["fecha_seguimiento"]));
                    if(isset($A["privado"]))
                        $int->privado = ($A["privado"]);
                    $int->usuario_modifica = Auth::user()->username;
                    $int->update();
                }
            }
        }
        echo '<Grid>';
        echo '<Changes>';
        echo '<IO Result="0" Message="La información ha sido grabada" />'.$cambios;
        echo '</Changes>';
        echo '</Grid>';
    }

    public function subirFotoInteligencia(Request $request)
    {
        if($request->file('file')) {
                $file = $request->file('file');
                $name = 'inteligencia' . $request["codigo"] .'.'.$file->getClientOriginalExtension();
                $path = public_path().'/images/inteligencia/images/';
                $file->move($path,$name);
                $img = Image::make($path.$name)->resize(200, 200);
                $img->save('images/inteligencia/images/'.$name);
                $int = Inteligencia::find($request["codigo"]);
                $int->foto_nombre = $name;
                $int->save();

        }
    }
    public function subirDocsInteligencia(Request $request)
    {
        if($request->file('file')) {
                $file = $request->file('file');
                $name = 'inteligencia' . $request["codigoDocs"] .'.'.$file->getClientOriginalExtension();
                $path = public_path().'/images/inteligencia/documentos';
                $file->move($path,$name);
                $int = Inteligencia::find($request["codigoDocs"]);
                $int->documentos = $name;
                $int->save();

        }
    }


}
