<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videotab extends Model
{
    //            $table->increments('id');
    //
    //            $table->tinyInteger('slug')->unique();
    //            $table->string('title');
    //            $table->string('icon');
    //            $table->text('roles');
    //
    //            $table->integer('videopage_id')->unsigned()->index();
    //            $table->foreign('videopage_id')
    //                ->references('id')
    //                ->on('videopages')
    //                ->onDelete('cascade');
    protected $fillable = [
        'slug', 'title', 'icon', 'roles', 'videopage_id'
    ];

    public function page(){
        return $this->belongsTo('App\Videopage', 'videopage_id');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }
}
