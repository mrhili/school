<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable = [
	            'name',
	            'objective',
	            'introduction',
	            'content',
	            'teaser_type',
	            'teaser_text',
	            'teaser_video',
              'created_by'

    ];

    public function populating()
    {
        return $this->hasMany('App\Courseyearsubclass');
    }

    public function subcourses(){
    	return $this->belongsToMany('App\Subcourse')->withPivot('sorting')->withPivot('id');
    }

    public function created_by()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

}
