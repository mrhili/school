<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Application;
use ArrayHolder;
use Debugbar;
use Auth;
class DebugController extends Controller
{
    public function changeDebug($role){

        $enable = Application::setDebuggar( $role, 'change' );

        if(Auth::user()->role == $role ){

          if( $enable ){

            Debugbar::enable();

          }else{

            Debugbar::disable();
          }

        }

        return response()->json( [
          'roleId' => $role ,
          'roleName' => ArrayHolder::roles_routing( $role ),
          'enable' => $enable
          ] );
    }
}
