<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('frontend.product.product_details', compact('product'));
    }

    public function add_to_cart($id)
    {
        $cart_exists = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
        if ($cart_exists) {
            $cart_exists->qty = $cart_exists->qty + 1;
            $cart_exists->update();
            return redirect()->back()->with('message', 'Product quantity updated');
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->product_id = $id;
            $cart->qty = 1;
            $cart->save();
            return redirect()->back()->with('message', 'Product successfully added to the cart');
        }
    }
    public function add_to_cart_with_qty()
    {

        $cart_exists = Cart::where('product_id', request()->input('product_id'))->first();
        if ($cart_exists) {
            $cart_exists->qty = request()->input('qty');
            $cart_exists->update();
            return redirect()->back()->with('message', 'Product quantity updatede');
        } else {
            $cart = new Cart();
            $cart->user_id = 1;
            $cart->product_id = request()->input('product_id');
            $cart->qty = request()->input('qty');
            $cart->save();
            return redirect()->back()->with('message', 'Product successfully added to the cart');
        }
    }

    public function cart()
    {
        $carts = Cart::with('product:id,product_name,sales_price')->get();
        $totalSum = $carts->map(function ($cart) {
            if($cart->product->discounts()->latest()->first()){
                return $cart->product->discounts()->latest()->first()->discount_price * $cart->qty;
            }else{
                return $cart->product->sales_price * $cart->qty;
            }

        })->sum();
        return view('frontend.cart.addcart', compact('carts', 'totalSum'));
    }

    public function quantityUpdate()
    {
        if (request()->input('product') && count(request()->input('product'))) {
            foreach (request()->input('product') as $index => $item) {
                $cart = Cart::where('id', $index)->first();
                if ($cart) {
                    $cart->qty = $item;
                    $cart->update();
                }
            }
            return redirect()->back()->with('message', 'Cart successfully updated');
        }
    }

    public function cartDelete($id)
    {

        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('message', 'Cart successfully delete');
        }
    }

    public function checkout(){

        $carts = Cart::with('product:id,product_name,sales_price')->get();
        $totalCost = $carts->map(function ($cart) {
            if($cart->product->discounts()->latest()->first()){
                return $cart->product->discounts()->latest()->first()->discount_price * $cart->qty;
            }else{
                return $cart->product->sales_price * $cart->qty;
            }
        })->sum();
        return view('frontend.checkout.checkout',compact('totalCost','carts'));
    }
      
    
}
