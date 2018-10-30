<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //
    protected $fillable = [
      'title','body','type','link', 'role', 'user_id', 'images'
    ];
    public function created_by()
    {
        return $this->belongsToMany('App\User');
    }
    public function appears()
    {
        return $this->belongsToMany('App\User');
    }
}
