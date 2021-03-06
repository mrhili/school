<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //

    protected $fillable = [
    	"testyearsubclass_id",
    	"year_id",
    	"the_class_id",
    	"subject_id",
    	"subject_the_class_id",
    	"teatcher_id",
    	"student_id",
    	"seen",
      "test_passed_fine",
    	"note",
    	'done_minutes',
      'answers'
    ];

    public function testyearsubclass()
    {
        return $this->belongsTo('App\Testyearsubclass', 'testyearsubclass_id');
    }

    public function teatcher()
    {
        return $this->belongsTo('App\User', 'teatcher_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
