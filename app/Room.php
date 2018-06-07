<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    /**/
    protected $fillable = [
    	'name',
    	'roomtype_id',
    	'space',
    	'description',
    	'etage_id',

    ];
}
