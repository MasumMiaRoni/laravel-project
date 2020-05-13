<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\VisitorCount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function FrontPage(){
        $product = Product::all();
        return view('frontend.main',compact('product'));
    }

    function SingleProduct($slug){
        $product = Product::where('slug',$slug)->first();
        $title = $product->product_name;
        $realated_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();

        $user_ip = $_SERVER['REMOTE_ADDR'];

        $visit_check = VisitorCount::where('product_id' , $product->id)->where('user_id',$user_ip)->first();
        if($visit_check){
            VisitorCount::increment('visited');
        }

      else{
        VisitorCount::insert([
            'product_id'=>$product->id,
            'user_id'=>$user_ip,
            'visited'=>1,
        ]);
      }
        return view('frontend.single_product',compact('product','title','realated_product'));
    }

    function shop(){
        $categories = Category::orderBy('category_name','asc')->get();
        $products = Product::orderBy('product_name','asc')->get();
        return view('/frontend.shop',compact('categories','products'));
    }

    function SingleCart($product_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];

        if (Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->exists()){
            Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->increment('product_quantity');
        }

        else{
            Cart::insert([
                'product_id'=> $product_id,
                'user_ip'=>$user_ip,
                'created_at' => Carbon::now()
            ]);
        }

        return back();


    }

    function search(){
        $que = 'Nature Honey';

        $data = Product::where('product_name', 'LIKE', "%{$que}%")->get();

        return $data;
    }


}
