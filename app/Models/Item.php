<?php

namespace App\Models;
use App\Models\LineaItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla en la base de datos.

   protected $fillable = [
    'id',
    'COD_CATEGORIA',
    'NOMBRE',
    'DESCRIPCION',
    'UNIDAD',
    'MEMORIADESCRIPTIVA',
    'IMAGEN',
    'BASE_PRECIO',
       
    ];

    // Resto de la clase del modelo...

    public function lineasItem()
    {
        //return $this->hasMany(LineaItem::class);
        return $this->hasMany('App\Models\LineaItem', 'COD_ITEMS'); // Especifica el nombre de la columna de la clave foránea
  
    }
}
