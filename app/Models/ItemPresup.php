<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPresup extends Model
{
    use HasFactory;

    protected $table = 'items_presup'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

    protected $fillable = [
     'id',
     'COD_PRESUP',
     'ORDEN_RUBRO',
     'ORDEN_SUBRUBRO',
     'ORDEN_ITEM',
     'NIVEL',
     'COD_ITEMS',
     'NOMBRE',
     'UNIDAD',
     'CANTIDAD',
     'IMPORTE',
     'FACTOR_PRECIO_VENTA',
     'MO',
     'MATERIALES',
     'EQUIPOS',
        
     ];
 
     // Resto de la clase del modelo...
 
     public function lineasItem()
     {
         //return $this->hasMany(LineaItem::class);
         return $this->hasMany('App\Models\LineaItemPresup', 'COD_ITEMS'); // Especifica el nombre de la columna de la clave foránea
   
     }
}
