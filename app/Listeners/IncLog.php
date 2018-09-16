<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;

use App\{
	Catcher
};
class IncLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */


    public function handle(Login $event)
    {

      $user = $event->user;
      $user->log++;
      $user->save();



      $catch = Catcher::firstOrNew([
        'user_id' => $user->id,
        'user_ip' => request()->ip(),
        'user-agent' => request()->header('user-agent'),
      ]);

      $catch->save();

    }
}
