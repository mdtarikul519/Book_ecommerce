<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\exta\EcomBanner;
use App\Models\orders\OrderProduct;
use App\Models\products\Product;
use App\Models\products\ProductCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
      $banners = EcomBanner::get();
      $products = Product::with('discounts')->get();
      // dd($products);
      $categories = ProductCategory::get();
      $product_order  = OrderProduct::get();
      return view('frontend.index', compact('banners', 'products','categories','product_order'));
   }
}
