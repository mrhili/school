<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $casts = [
        'body' => 'array',
        'notes' => 'array',
        'answers' => 'array'

    ];

    protected $fillable= [
        'kind', 'title','info','body', 'notes', 'answers', 'time_minutes', 'ready', 'subunity_id'
    ];






    public function school()
    {
        return $this->hasMany('App\School');
    }

    public function subunity()
    {
        return $this->belongsTo('App\Subunity');
    }

    public function sublevels()
    {
        return $this->belongsToMany('App\Sublevel');
    }

//////////////////////
    public function notes()
    {
        return $this->hasMany('App\Note', 'testyearsubclass_id');
    }

    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass');
    }
}
