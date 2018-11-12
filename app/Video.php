<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //            $table->increments('id');
    //
    //            $table->tinyInteger('slug')->unique();
    //            $table->tinyInteger('title');
    //            $table->string('url')->unique();
    //            $table->text('text')->unique();
    //            $table->text('roles');
    //
    //            $table->integer('videotab_id')->unsigned()->index();
    //            $table->foreign('videotab_id')
    //                ->references('id')
    //                ->on('videotabs')
    //                ->onDelete('cascade');
    //
    //            $table->timestamps();
    //        });

    protected $fillable = [
         'title','url', 'text', 'roles', 'videotab_id'
    ];

    public function tab(){
        return $this->belongsTo('App\Videotab', 'videotab_id');
    }




}
