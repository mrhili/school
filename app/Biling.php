<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biling extends Model
{

    protected $fillable = [
      'bil_id', 'user_id', 'toke', 'payed', 'token_id', 'year_id'
    ];

    public function bil()
    {
        return $this->belongsTo('App\Bil', 'bil_id');
    }


    public function client()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function accept_by()
    {
        return $this->belongsTo('App\User', 'token_id');
    }

}
