<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use softDeletes;

    function get_category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
