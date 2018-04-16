<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheClass extends Model
{
    //
    public function students()
    {
        return $this->hasMany('App\User');
    }
}
