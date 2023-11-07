<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\orders\Order;
use App\Models\orders\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function view()
    {
        $orders = Order::with('user')->get();
        return view('dashboard.order.index', compact('orders'));
    }

    public function Confirm_order(Request $request)

    {
        //$product_discount
        //dd(json_decode($request->shipping_method));
        $data = new Order();
        $data->user_id = Auth::user()->id;
        $data->order_status = 'pending';
        $data->total_price = $request->total_price;
        $data->sub_total = $request->sub_total;
        $data->invoice_id = 'IN-' . rand(10000, 9999999);
        $data->date = Carbon::now()->toDateString();
        $data->delivery_method = json_decode($request->shipping_method)->method_name;
        $data->delivery_cost = json_decode($request->shipping_method)->cost;
        //$data->discount_percent = $cart->product->discounts()->latest()->first();
        $data->discount_price =
            //dd($data);  
            $data->save();

        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        //dd($carts);
        foreach ($carts as $cart) {
            // dd($carts);
            $orderProducts = new OrderProduct();
            $orderProducts->product_id = $cart->product_id;
            $orderProducts->order_id = $data->id;
            if ($cart->product->discounts()->latest()->first()) {
                $orderProducts->product_price = $cart->product->discounts()->latest()->first()->main_price;
            } else {
                //dd($cart);
                $orderProducts->product_price = $cart->product->sales_price;
            }

            if ($cart->product->discounts()->latest()->first()) {
                $orderProducts->discount_percent  = $cart->product->discounts()->latest()->first()->discount_percent;
            } else {
                $orderProducts->discount_percent = 0;
            }

            if ($cart->product->discounts()->latest()->first()) {
                $orderProducts->discount_price  = $cart->product->discounts()->latest()->first()->discount_price;
            } else {
                $orderProducts->discount_price = $cart->product->sales_price;
            }

            $orderProducts->qty = $cart->qty;
            $orderProducts->save();
        };
        return redirect()->back()->with('message', 'data successfully added');
    }


    public function details($id){
        
        $details = Order::find($id);
        return view('dashboard.order.details', compact('details'));
    }
}
