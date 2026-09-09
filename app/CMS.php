<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CMS extends Model
{
    //


    public $fillable= ['txt', 'slug'];
    protected $table = 'c_m_s_s';

    public function page(){
      return $this->hasOne('App\Page', 'cms_id');
    }
}
