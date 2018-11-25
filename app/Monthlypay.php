<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthlypay extends Model
{
    protected $fillable = [
        'name','type', 'month_id'
    ];

    public function month()
    {
        return $this->belongsTo('App\Month');
    }

    public function inputings()
    {
        return $this->hasMany('App\Inputing');
    }

    public function outputings()
    {
        return $this->hasMany('App\Outputing');
    }
}
