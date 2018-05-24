<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryship extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    public function Relashionships()
    {
        return $this->hasMany('App\Relationship', 'categoryship_id');
    }
}
