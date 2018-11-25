<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
    		'name'
    ];

    public fuunction sublevel(){
    	$this->belongsTo('App\Sublevel');
    }
}
