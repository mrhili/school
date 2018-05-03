<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryCategory extends Model
{
    //

    protected $fillable = [

                'name',

            'model'

            
    ];

    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
