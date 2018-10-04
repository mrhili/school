<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruleholder extends Model
{
    //

    protected $fillable = [
      'user_id', 'rule_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rule()
    {
        return $this->belongsTo('App\Rule');
    }

}
