<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryCategory extends Model
{
    //

    protected $table = 'history_categories';

    protected $fillable = [

                'name',

            'model',
            'icon',
            'kind',
            'role'

            
    ];

    public function histories()
    {
        return $this->hasMany('App\History', 'category_history_id');
    }

}
