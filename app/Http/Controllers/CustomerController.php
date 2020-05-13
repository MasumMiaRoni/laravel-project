<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{




    function index(){
        $product = Product::all();
        return view('frontend.main',compact('product'));
    }
}
