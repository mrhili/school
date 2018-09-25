<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    protected $fillable = [

      'history_id','amount','mines'
    ];

    public function history(){
      return $this->belongsTo('App\History');
    }
}
