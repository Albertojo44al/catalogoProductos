<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    protected $table= 'shopping_car_details'

    // muchos a uno
     public function carrito()
     {
         return $this->belongsTo('App\Carrito','car_id');
     }

     // uno a uno
     public function productos()
     {
         return $this->hasOne('App\Producto','product_id');
     }

}
