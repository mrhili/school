<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
  public $fillable = ['slug'];

  public function particompo(){

    $this->hasMany('App\Particompo','component_id')->withPivot('json');

  }

}
