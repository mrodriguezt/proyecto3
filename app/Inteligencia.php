<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inteligencia extends Model
{
    protected $table ="inteligencia";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','foto_nombre','fecha','nombre_tercero','tipo_contacto','publico','privado','formato_contacto','contactos_clave','foto','asistentes','involucrados_scmi','proposito','proposito_otro','pais','ciudad','ubicacion','industria','sub_industria','pais_interes','detalle_contacto','documentos','requiere_seguimiento','requerimiento_seguimiento','fecha_seguimiento','created_at','updated_at'
    ];

}
