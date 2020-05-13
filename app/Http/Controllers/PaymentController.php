<?php

namespace App\Http\Controllers;


use App\Billings;
use App\Cart;
use App\Http\Middleware\Authenticate;
use App\Product;
use App\Sale;
use App\Shippings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Mail;
use App\mail\OrderShipped;

class PaymentController extends Controller
{
    function Payment(Request $request){


        $sub_total = $request->session()->get('sub_total');
        $discount = $request->session()->get('discount');

        $shipping_id = Shippings::insertGetId([

            'user_id' =>Auth::user()->id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'notes' => $request->notes,
            'created_at' => Carbon::now()
        ]);

        $sale_id = Sale::insertGetId([

            'user_id' => Auth::user()->id,
            'shipping_id' => $shipping_id,
            'grand_total' => $sub_total,
            'discount' => $discount,
            'created_at' => Carbon::now()

        ]);

        $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = Cart::with('get_product')->where('user_ip',$user_ip)->get();
        foreach($carts as $item){

        Billings::insert([
            'user_id' => Auth::user()->id,
            'sale_id' => $sale_id,
            'product_id' => $item->product_id,
            'shipping_id' => $shipping_id,
            'product_price' => $item->get_product->product_price,
            'product_quantity' => $item->product_quantity,
            'created_at' => Carbon::now(),

        ]);


        Product::findOrFail($item->product_id)->decrement('product_quantity', $item->product_quantity);
        $item->delete();

        }

        \Stripe\Stripe::setApiKey('sk_test_TE7I8K9J34MjpI4P5zsUvd8j00sGWa4nli');

        \Stripe\Charge::create([
            'amount' => $sub_total * 100,
            'currency' => 'usd',
            "source" => $request->stripeToken,
        ]);


        $orderdata = Billings::where('shipping_id',$shipping_id)->get();

        Mail::to(Auth::user()->email)->send(new OrderShipped($orderdata));

        return redirect('checkout');

    }
}
