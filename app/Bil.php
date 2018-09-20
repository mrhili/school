<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bil extends Model
{
    //

    public function bilings()
    {
        return $this->hasMany('App\Biling', 'bil_id');
    }

    protected $fillable = [
      'service', 'price'
    ];
}
