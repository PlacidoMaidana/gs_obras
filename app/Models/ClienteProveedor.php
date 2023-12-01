<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteProveedor extends Model
{
    use HasFactory;

    protected $table = 'clientes_proveedores'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.
    protected $fillable = [
        'id',
        'activo',
        'razon_social',
        'DNI',
        'domicilio',
        'provincia',
        'cod_postal',
        'telefono',
        'mail',
        'moneda',
        'condicion_iva',
        'registro_fce',
        'observaciones',
        'tipo',
        'created_at',
        'updated_at',
    ];

}
