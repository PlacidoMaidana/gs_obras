<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

    protected $fillable = [
        "id",
        "FAMILIA",
        "SUB_FAMILIA",
        "DESCRIPCION",
        "UNIDAD",
        "PRECIO_UNIT",
        "ID_PROVEEDOR",
        "FECHA_PRECIO",
        "CANTIDAD",
        "CODIGO_PROVEEDOR", //Código utilizado para vincular con el código que le da el proveedor al insumo, utilizado para la importación 
        "ACTIVO",
        "unidad_compra",
        "factor_conversion",
        "precio_unidad_compra",
        "createdEat",
        "updated_at",
        "deleted_at", 
    ];

    function lineasItems() {
        $this->hasMany('App\Models\LineaItem','COD_INSUMO');
    }



}
