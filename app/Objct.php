<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objct extends Model
{
    //

    protected $fillable =[

    	'name', 'img', 'description', 'objctype_id', 'room_id', 'state'

    ];

}
