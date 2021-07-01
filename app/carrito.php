<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table = 'shopping_car';

    //un carrito puede tener un usuario 
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

    //un carrito puede tener muchos productos
    public function productos()
    {
        return $this->hasMany('App\Producto','product_id','id');
    }
   
    // uno a muchos
    public function carritoDetale(){
        return $this->hasMany('App\CarritoDetalle')
    }
}

