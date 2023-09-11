<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

   /* protected $fillable = [
        'campo1',
        'campo2',
        // Agrega aquí otros campos que deseas permitir que se llenen de forma masiva.
    ];*/
}
