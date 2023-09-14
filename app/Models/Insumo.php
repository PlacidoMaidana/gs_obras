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
        "NRO_SERIE",
        "UNIDAD",
        "PRECIO_UNIT",
        "COD_CLI_PRO",
        "FECHA_PRECIO",
        "CANTIDAD",
        "EXISTENCIA",
        "DATC_CODE",
        "ACTIVO",
        "unidad_compra",
        "factor_conversion",
        "precio_unidad_compra",
        "cant_cod_serie",
        "createdEat",
        "updated_at",
        "deleted_at", 
    ];
}
