<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetingpopulating extends Model
{
    //
    protected $fillable = [
      'meeting_id',
      'creator_id',
      'invited_id',
      'note',
      'present'
    ];

    public function meeting()
    {
        return $this->belongsTo('App\Meeting');
    }

    public function created_by()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function invitation_for()
    {
        return $this->belongsTo('App\User', 'invited_id');
    }
}
