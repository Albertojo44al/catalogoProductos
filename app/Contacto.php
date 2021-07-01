<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'name', 'email', 'comment','product_id',
    ];

    protected $table = "contact_comments";
    
}
