<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    public $fillable = [
      'name', 'tel', 'user_id', 'body'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
