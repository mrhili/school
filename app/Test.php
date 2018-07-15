<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //


        protected $casts = [
            'body' => 'array',
            'notes' => 'array',
            'answers' => 'array',

        ];

        protected $fillable= [
            'title', 'img','body', 'notes', 'answers', 'time_minutes', 'ready'
        ];


    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass');
    }




}
