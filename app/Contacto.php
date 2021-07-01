<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = "contact_comments";
    
     //un carrito puede tener muchos productos
     public function productos()
     {
         return $this->belongsTo('App\Producto','product_id');
     }
}
