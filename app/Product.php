<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [

        'category_id',
        'subcategory_id',
        'product_name',
        'product_summary',
        'product_description',
        'product_price',
        'product_quantity',
        'product_thumbnail',
    ];

    function get_category(){
        return $this->belongsTo('App\Category','category_id');
    }
    function get_subcategory(){
        return $this->belongsTo('App\SubCategory','subcategory_id');
    }
}
