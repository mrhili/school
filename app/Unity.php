<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    //
    //
    protected $fillable = ['name'];


    public function subunities()
    {
        return $this->hasMany('App\Subunity');
    }

    public function add_classes()
    {
        return $this->belongsToMany('App\Addclass')->withPivot('teatcher_id');
    }

    public function add_classes_teatcher()
    {
        return $this->belongsToMany('App\User')->withPivot('addclass_id');
    }

    public function classes(){
        return $this->belongsToMany('App\TheClass');
    }






}
