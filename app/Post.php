<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\Traits\HasComments;
class Post extends Model
{
      use HasComments;
    //
    //
    protected $fillable = [
      'title','body','type','link', 'role', 'user_id', 'images', 'confirmed'
    ];
    public function created_by()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function appears()
    {
        return $this->belongsToMany('App\User');
    }
}
