<?php

namespace App\Http\Controllers;

use App\Cart;
use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function Checkout(){


       $auth_user = Auth::user();
       $countries = Country::orderBy('name','asc')->get();
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = Cart::with('get_product')->where('user_ip',$user_ip)->get();
        $sub_total = 0;
        foreach ($carts as $cart){
            $sub_total += $cart->get_product->product_price * $cart->product_quantity;
        }

        session(['sub_total' => $sub_total]);
       return view('frontend.checkout',compact('auth_user','countries','carts','sub_total'));
   }

   function GetStateList($country_id){
        $states = State::where('country_id',$country_id)->get();
        return response()->json($states);
   }

   function GetCityList($state_id){
        $cities = City::where('state_id',$state_id)->get();
        return response()->json($cities);
   }
}
