<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialdeficite extends Model
{
    //

    protected $fillable = [

      'type', 'id_model', 'reason', 'paid', 'return', 'year_id', 'price'

    ];

    public function materialdeficites()
    {
        return $this->bolongsTo('App\Year');
    }

}
