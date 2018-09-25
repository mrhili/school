<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transparancy extends Model
{
    //
    protected $fillable = [
        'user_id', 'amount',
        'mines',
        'fliped'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
