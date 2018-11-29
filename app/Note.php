<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //

    protected $fillable = [
    	"testyearsubclass_id",
    	"year_id",
    	"student_id",
    	"seen",
      "test_passed_fine",
    	"note",
    	'done_minutes',
      'answers',
      'moreinfo'
    ];

    public function testyearsubclass()
    {
        return $this->belongsTo('App\Testyearsubclass', 'testyearsubclass_id');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function student()
    {
        return $this->belongsTo('App\User');
    }

//MAY NOT USE


}
