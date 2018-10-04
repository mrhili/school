<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagepartial extends Model
{
    //
    protected $table = 'page_partial';
    protected $fillable = ['partial_id', 'page_id', 'json'];
    
    protected $casts = [
        'json' => 'array',
    ];
    public function page(){

      return $this->belongsTo('App\Page');

    }


    public function partial(){

      return $this->belongsTo('App\Partial');

    }

    public function particompos(){

      return $this->hasMany('App\Particompo','page_partial_id');

    }

}
