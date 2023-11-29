<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaItemPresup extends Model
{
    use HasFactory;

    protected $table = 'linea_items_presup'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

    protected $fillable = [
        'id',
        'COD_PRESUP',
        'COD_RUBRO',
        'COD_ITEMS',
        'COD_INSUMO',
        'PRECIO',
        'CANTIDAD',
        'PADRE',
        'TIENE_HIJOS',
        'indice',
        
     ];

     public function item()
     {
         //return $this->belongsTo(Item::class);
         return $this->belongsTo('App\Models\ItemPresup', 'COD_ITEMS'); // Especifica el nombre de la columna de la clave foránea
 
     }

     public function insumo()  {
        return $this->belongsTo('App\Models\Insumo','COD_INSUMO');
        
     }

}
