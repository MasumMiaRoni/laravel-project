<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    function Cart($coupon = ''){

        if ($coupon == ''){
            $discount = 0;
            session(['discount' => $discount]);
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $carts = Cart::with('get_product')->where('user_ip',$user_ip)->get();
            return view('frontend.cart',compact('carts','discount'));

        }
        else{
            if (Coupon::where('coupon_code',$coupon)->exists()){
                 $validity = Coupon::where('coupon_code',$coupon)->first()->coupon_validity;

                if (Carbon::now()->format('y-m-d') <= $validity){
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                    $carts = Cart::with('get_product')->where('user_ip',$user_ip)->get();
                    $discount = Coupon::where('coupon_code',$coupon)->first()->coupon_discount;
                    session(['discount' => $discount]);
                    $coupon_name = Coupon::where('coupon_code',$coupon)->first()->coupon_code;
                    $coupon = Coupon::where('coupon_code',$coupon)->first()->coupon_code;
                    return view('frontend.cart',compact('carts','discount','coupon','coupon_name'));
                }
                else{
                    return "expired";
                }
            }
            else{
                return "nai";
            }

        }

    }

    function SingleCartDelete($cart_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];
        Cart::where('id',$cart_id)->where('user_ip',$user_ip)->delete();
        return back()->with('CartDelete','Cart Delete Successfully');
    }

    function CartUpdate(Request $request){

        foreach ($request->cart_id as $key => $item){

            Cart::findOrFail($item)->update([
                'product_quantity' => $request->product_quantity[$key],
                'updated_at' => Carbon::now(),

            ]);
        }
        return back();
    }
}
