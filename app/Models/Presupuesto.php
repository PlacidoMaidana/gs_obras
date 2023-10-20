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
        'NOMBRE',
        'FECHA',
        'MONTO_TOT',
        'MONTO_VENTA',
        'FACTOR_PRECIO_VENTA',
        'PLAZO_OBRA',
        'APROBADO',
        'PERIODO_ANALISIS',
        'OBSERVACIONES',
        'COD_OBRA',
        'PAGOS',
        'id_Grupo',
        'forma_envio',
        'guardado_en',
        'nro_orden_compra',
        'fecha_orden_compra',
        'cod_centrocosto',
        'Pedido_por',
        'indice_MO',
        'indice_MATERIALES',
        'indice_EQUIPOS',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
