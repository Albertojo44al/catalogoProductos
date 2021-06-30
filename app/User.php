<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';


    //un usuario puede tener muchos productos
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }

    // un usuario puede tener muchos carritos
    public function carritos()
    {
        return $this->hasMany('App\Carrito');
    }
}
