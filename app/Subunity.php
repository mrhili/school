<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subunity extends Model
{
    protected $fillable = ['name', 'unity_id'];


    public function unity()
    {
        return $this->belongsTo('App\Unity');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

}
