<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    //
    public $fillable = ['slug'];


    public function page_partials(){

      $this->hasMany('App\Pagepartial','component_partial', 'partial_id')->withPivot('json');

    }


    public function pages(){
      return $this->belongsToMany('App\Page');
    }


}
