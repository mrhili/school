<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catcher extends Model
{
    //        'user_id' => $user->id,
            'user_ip' => request()->ip(),
            'user-agent' => request()->header('user-agent'),

    protected $fillable = [
      'user_id' => $user->id,
      'user_ip' => request()->ip(),
      'user_agent' => request()->header('user-agent'),

    ];
}
