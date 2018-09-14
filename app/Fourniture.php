<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fourniture extends Model
{
    //

    protected $fillable = [
    	'name','additional_info','for','required','average_price', 'got'
    ];

    public function the_classes()
    {
        return $this->belongsToMany('App\TheClass');
    }

    public function fourniturations()
    {
        return $this->hasMany('App\Fournituration');
    }

    public function demandes()
    {
        return $this->hasMany('App\Demandefourniture');
    }





}
