<?php

namespace App\Models;
use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaItem extends Model
{
    use HasFactory;
    protected $table = 'linea_items'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

    protected $fillable = [
        'id',
        'COD_ITEMS',
        'COD_INSUMO',
        'CANTIDAD',
        'orden_insumo',
        
     ];

     public function item()
     {
         //return $this->belongsTo(Item::class);
         return $this->belongsTo('App\Models\Item', 'COD_ITEMS'); // Especifica el nombre de la columna de la clave foránea
 
     }

     public function insumo()  {
        return $this->belongsTo('App\Models\Insumo','COD_INSUMO');
        
     }
}
