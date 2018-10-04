<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    public $fillable= ['title', 'cms_id'];


    public function page_partials(){

      return $this->hasMany('App\Pagepartial');

    }



    public function cms(){
      return $this->belongsTo('App\CMS', 'cms_id');
    }
    public function partials(){
      return $this->belongsToMany('App\Partial');
    }
}
