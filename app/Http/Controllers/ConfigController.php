<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use App\Helpers\Common\Pics;
use File;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $configs = Config::all();

        return view('back.config.index', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('back.config.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeConfig(Request $request, Config $config)
    {
        //
        Config::create( $request->all() );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $requests, Config $config)
    {


        //
        $reqToArray = array_except( $requests->toarray(), ['_token','submit']);


         foreach ( $reqToArray  as $slug => $request ) {

            $temp = $config->where( 'slug' , $slug  )->first();




            if( $temp->type == "file" ){




                if( $requests->hasFile( $slug ) ){

                        if( $requests->file( $slug )->getClientOriginalName() !=  $temp->value ){

                            $imagAndTime = Pics::storeCompareFile( $slug, 'config', $temp->value ,$requests );

                            $temp->fill(['value' => $imagAndTime ])->save();

                        }


/*
    public static function storeCompareFile($slug = '', $dir = '', $file = '' ,$request ){

        $imgName = $request->file( $slug )->getClientOriginalName();




            if( file_exists( base_path().'/public/images/'. $dir .'/'.$file ) ){

                File::delete( base_path().'/public/images/'. $dir .'/' . $file );

                $imagAndTime = time() . '_' . $imgName ;

                $request->file( $slug )->move( base_path().'/public/images/'. $dir .'/', $imgAndTime );

                return true;

            }


    }



*/

/*
                    $imgName = $requests->file( $slug )->getClientOriginalName();


                    if( $imgName != $temp->value ){


                        if( file_exists( base_path().'/public/images/config/'.$temp->value ) ){

                            File::delete( base_path().'/public/images/config/' . $temp->value );

                            $imagAndTime = time() . '_' .$imgName;

                            $requests->file( $slug )->move( base_path().'/public/images/config/', $imgAndTime );

                        }



                        $temp->fill(['value' => $imagAndTime])->save();

                    }

*/

                }



            }else{
                    $temp->fill([

                        "value" => $request
                    ])->save();
            }



            $temp = null;

         }


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
