<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class CMS extends Model
{
    //
    use NodeTrait;

    protected $table = 'c_m_s_s';

    public $fillable= ['txt', 'slug'];

    public function page(){
      return $this->hasOne('App\Page', 'cms_id');
    }
}
