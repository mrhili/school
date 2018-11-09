<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\Traits\HasComments;

use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

class Post extends Model implements LikeableContract
{
      use HasComments;

      use Likeable;

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
