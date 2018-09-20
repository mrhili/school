<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\{
    User,
    Year,
    History,
    Categoryship,
    Relashionship
};

class WorkerController extends Controller
{
    //



        public function workersInv($user = null){

          if(!$user){

            $workers = User::where('role','>', 2)->where('role','<', 6)->get();

          }else{

            $workers = User::where('id', $user)->get();

          }

          return view('back.workers.printables.inv', compact('workers'));

        }

        /**************/

        public function workersLogin(){


        	return view('back.workers.login');

        }

        public function workersLoginData(){

            return Datatables::of(User::where('role', '>', 2)->where('role','<', 6)->get() )


                ->editColumn('site', function( $model ){

                   return route('index');

               })
                ->editColumn('nomcomplet', function( $model ){

                 return $model->name . ' '. $model->last_name;

             })

            ->editColumn('email', function( $model ){

              return $model->email;


            })
            ->editColumn('password', function( $model ){

                return $model->password;

            })

            ->editColumn('log', function( $model ) {

                return $model->log;

            })
            ->editColumn('log_info', function( $model ){

                return link_to('#', 'Info', ['class' => 'btn btn-info btn-circle btn-info', 'data-id' => $model->id ], null);

            })



            ->make(true);

        }



}
