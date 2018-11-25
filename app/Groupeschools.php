<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupeschools extends Model
{
    protected $fillable ['name'];

    public function schools(){
    	$this->hasMany('App\School');
    }
}
