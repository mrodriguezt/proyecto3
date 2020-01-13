<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Pipeline;
use Illuminate\Http\Request;

class OportunidadesController extends Controller
{
    //oportunidades
    public function oportunidades()
    {

        $paises = Pais::select('id as value','nombre as label')->where('status','A')->get()->pluck('label','value');
        return view('oportunidades.index')->with('paises',$paises);
    }
    public function layoutPipeline()
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
        $data = ["nPaises"=>$nPaises,"cPaises"=>$cPaises];
        return response()->view("oportunidades.layout.oportunidades",$data)->header('Content-Type', 'text/xml');
    }
    public function dataPipeline()
    {
        $oportunidades = Pipeline::where('estado','!=','X')->get();
        $data = ["oportunidades"=>$oportunidades];
        return response()->view("oportunidades.data.oportunidades",$data)->header('Content-Type', 'text/xml');
    }
    public function savePipeline()
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
                    $pip = Pipeline::find($A["id"]);
                    $pip->estado='X';
                    $pip->update();
                } else if(!empty($A["Added"])){
                    $pip = Pipeline::create(['empresa' => $A["empresa"],'pais' => $A["pais"],
                                            'ciudad' => $A["ciudad"],
                                            'cliente' => $A["cliente"],
                                            'codigo_licitacion' => $A["codigo_licitacion"],
                                            'nombre_proyecto' => $A["nombre_proyecto"],
                                            'industria' => $A["industria"],
                                            'sub_industria' => $A["sub_industria"],
                                            'estado' => $A["estado"],
                                            'valor_oferta_scmi' => $A["valor_oferta_scmi"],
                                            'probabilidad_ejecucion' => $A["probabilidad_ejecucion"],
                                            'probabilidad_ganar' => $A["probabilidad_ganar"],
                                            'probabilidad_ejecutar' => $A["probabilidad_ejecutar"],
                                            'binario_pesimista' => $A["binario_pesimista"],
                                            'binario_esperado' => $A["binario_esperado"],
                                            'binario_optimista' => $A["binario_optimista"],
                                            'plazo_ejecucion' => $A["plazo_ejecucion"],
                                            'fecha_inicio' => date('Y-m-m',strtotime($A["fecha_inicio"])),
                                            'fecha_terminacion' => date('Y-m-m',strtotime($A["fecha_terminacion"])),
                                            'ingenieria' => $A["ingenieria"],
                                            'hh_ingenieria' => $A["hh_ingenieria"],
                                            'procura' => $A["procura"],
                                            'construccion' => $A["construccion"],
                                            'comisionado_pm' => $A["comisionado_pm"],
                                            'operacion_mantenimiento' => $A["operacion_mantenimiento"],
                                            'tipo_contrato' => $A["tipo_contrato"],
                                            'descripcion_alcance' => $A["descripcion_alcance"],
                                            'fecha_identificacion_opportunidad' =>date('Y-m-m', strtotime($A["fecha_identificacion_opportunidad"])),
                                            'fecha_invitacion' => date('Y-m-m',strtotime($A["fecha_invitacion"])),
                                            'fecha_visita' => date('Y-m-m',strtotime($A["fecha_visita"])),
                                            'visita_obligatoria' => $A["visita_obligatoria"],
                                            'fecha_preguntas' =>  date('Y-m-m',strtotime($A["fecha_preguntas"])),
                                            'fecha_respuestas' =>  date('Y-m-m',strtotime($A["fecha_respuestas"])),
                                            'fecha_entrega_oferta' =>  date('Y-m-m',strtotime($A["fecha_entrega_oferta"])),
                                            'fecha_negociacion' =>  date('Y-m-m',strtotime($A["fecha_negociacion"])),
                                            'fecha_adjudicacion' =>  date('Y-m-m',strtotime($A["fecha_adjudicacion"])),
                                            'actividades' => $A["actividades"],
                                            'competencia' => $A["competencia"],
                                            'adjudicatario' => $A["adjudicatario"],
                                            'valor_adjudicacion' => $A["valor_adjudicacion"],
                                            'forma_pago' => $A["forma_pago"],
                                            'codigo_interno' => $A["codigo_interno"],
                                            'proposal_mgr_asignado' => $A["proposal_mgr_asignado"]
                                            ]);
                    $cambios.= "<I id='".$A["id"]."' NewId='".$pip->id."' Changed='1'/>";
                }else if(!empty($A["Changed"])){
                    $pip = Pipeline::find($A["id"]);
                    if(isset($A["empresa"]))
                        $pip->empresa = ($A["empresa"]);
                    if(isset($A["pais"]))
                        $pip->pais = ($A["pais"]);
                    if(isset($A["ciudad"]))
                        $pip->ciudad = ($A["ciudad"]);
                    if(isset($A["cliente"]))
                        $pip->cliente = ($A["cliente"]);
                    if(isset($A["codigo_licitacion"]))
                        $pip->codigo_licitacion = ($A["codigo_licitacion"]);
                    if(isset($A["nombre_proyecto"]))
                        $pip->nombre_proyecto = ($A["nombre_proyecto"]);
                    if(isset($A["industria"]))
                        $pip->industria = ($A["industria"]);
                    if(isset($A["sub_industria"]))
                        $pip->sub_industria = ($A["sub_industria"]);
                    if(isset($A["estado"]))
                        $pip->estado = ($A["estado"]);
                    if(isset($A["valor_oferta_scmi"]))
                        $pip->valor_oferta_scmi = ($A["valor_oferta_scmi"]);
                    if(isset($A["probabilidad_ejecucion"]))
                        $pip->probabilidad_ejecucion = ($A["probabilidad_ejecucion"]);
                    if(isset($A["probabilidad_ganar"]))
                        $pip->probabilidad_ganar = ($A["probabilidad_ganar"]);
                    if(isset($A["probabilidad_ejecutar"]))
                        $pip->probabilidad_ejecutar = ($A["probabilidad_ejecutar"]);
                    if(isset($A["binario_pesimista"]))
                        $pip->binario_pesimista = ($A["binario_pesimista"]);
                    if(isset($A["binario_esperado"]))
                        $pip->binario_esperado = ($A["binario_esperado"]);
                    if(isset($A["binario_optimista"]))
                        $pip->binario_optimista = ($A["binario_optimista"]);
                    if(isset($A["plazo_ejecucion"]))
                        $pip->plazo_ejecucion = ($A["plazo_ejecucion"]);
                    if(isset($A["valor_oferta_scmi"]))
                        $pip->valor_oferta_scmi = ($A["valor_oferta_scmi"]);
                    if(isset($A["fecha_inicio"]))
                        $pip->fecha_inicio = date('Y-m-d',strototime($A["fecha_inicio"]));
                    if(isset($A["fecha_terminacion"]))
                        $pip->fecha_terminacion = date('Y-m-d',strototime($A["fecha_terminacion"]));
                    if(isset($A["ingenieria"]))
                        $pip->ingenieria = ($A["ingenieria"]);
                    if(isset($A["hh_ingenieria"]))
                        $pip->hh_ingenieria = ($A["hh_ingenieria"]);
                     if(isset($A["procura"]))
                        $pip->procura = ($A["procura"]);
                     if(isset($A["construccion"]))
                        $pip->construccion = ($A["construccion"]);
                     if(isset($A["comisionado_pm"]))
                        $pip->comisionado_pm = ($A["comisionado_pm"]);
                     if(isset($A["operacion_mantenimiento"]))
                        $pip->operacion_mantenimiento = ($A["operacion_mantenimiento"]);
                     if(isset($A["tipo_contrato"]))
                        $pip->tipo_contrato = ($A["tipo_contrato"]);
                     if(isset($A["descripcion_alcance"]))
                        $pip->descripcion_alcance = ($A["descripcion_alcance"]);
                     if(isset($A["fecha_identificacion_opportunidad"]))
                        $pip->fecha_identificacion_opportunidad = date('Y-m-d',strototime($A["fecha_identificacion_opportunidad"]));
                    if(isset($A["fecha_invitacion"]))
                        $pip->fecha_invitacion = date('Y-m-d',strototime($A["fecha_invitacion"]));
                    if(isset($A["fecha_visita"]))
                        $pip->fecha_visita = date('Y-m-d',strototime($A["fecha_visita"]));
                    if(isset($A["visita_obligatoria"]))
                        $pip->visita_obligatoria = ($A["visita_obligatoria"]);
                    if(isset($A["fecha_preguntas"]))
                        $pip->fecha_preguntas = date('Y-m-d',strototime($A["fecha_preguntas"]));
                    if(isset($A["fecha_respuestas"]))
                        $pip->fecha_respuestas = date('Y-m-d',strototime($A["fecha_respuestas"]));
                    if(isset($A["fecha_entrega_oferta"]))
                        $pip->fecha_entrega_oferta = date('Y-m-d',strototime($A["fecha_entrega_oferta"]));
                    if(isset($A["fecha_negociacion"]))
                        $pip->fecha_negociacion = date('Y-m-d',strototime($A["fecha_negociacion"]));
                    if(isset($A["fecha_adjudicacion"]))
                        $pip->fecha_adjudicacion = date('Y-m-d',strototime($A["fecha_adjudicacion"]));
                    if(isset($A["actividades"]))
                        $pip->actividades = ($A["actividades"]);
                    if(isset($A["competencia"]))
                        $pip->competencia = ($A["competencia"]);
                    if(isset($A["adjudicatario"]))
                        $pip->adjudicatario = ($A["adjudicatario"]);
                    if(isset($A["valor_adjudicacion"]))
                        $pip->valor_adjudicacion = ($A["valor_adjudicacion"]);
                    if(isset($A["forma_pago"]))
                        $pip->forma_pago = ($A["forma_pago"]);
                    if(isset($A["codigo_interno"]))
                        $pip->codigo_interno = ($A["codigo_interno"]);
                    if(isset($A["proposal_mgr_asignado"]))
                        $pip->proposal_mgr_asignado = ($A["proposal_mgr_asignado"]);

                    $pip->update();
                }
            }
        }
        echo '<Grid>';
        echo '<Changes>';
        echo $cambios;
        echo '</Changes>';
        echo '</Grid>';
    }

}
