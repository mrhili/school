<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolconfig extends Model
{
    //
    protected $fillable = [
    		'slug',
            'nameSetting',
            'value',
            'type'
    ];
}
