<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    function get_product(){
     return $this->belongsTo('App\Product','product_id');
 }
}
