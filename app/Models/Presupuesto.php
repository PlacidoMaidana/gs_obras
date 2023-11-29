<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;


    protected $table = 'presupuesto'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

    protected $fillable = [
        'id',
        'nombre',
        'fecha',
        'id_cliente',
        'estado',
        'nota_privada',
        'nota_publica',
        'id_tipo_obra',
        'costo_costo',
        'importe_venta',
        'created_at',
        'updated_at',
    ];
}
