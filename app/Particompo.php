<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particompo extends Model
{
    //

    protected $fillable = [
        'page_partial_id' => 'component_id','json'
    ];

    protected $table = 'component_partial';

    protected $casts = [
        'json' => 'array',
    ];

    public function partial(){

      return $this->belongsTo('App\Pagepartial' );

    }


    public function component(){

      return $this->belongsTo('App\Component');

    }

}
