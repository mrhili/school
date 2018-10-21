<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [
      'old_name', 'name', 'ext', 'file_type', 'model_type', 'model_id'
    ];





}
