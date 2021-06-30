<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'products';
    //uno a muchos hasMany
    //uno a uno hasOne
    //muchos a uno belongsTo


    // muchos productos pueden tener un usuario
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    // public function carrito()
    // {
    //     return $this->belongsTo('App\carrito','car_id');
    // }
    

    


}
