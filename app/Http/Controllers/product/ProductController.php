<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\products\Product;
use App\Models\products\ProductCategory;
use App\Models\products\ProductOffer;
use App\Models\products\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $product_categories = ProductCategory::get();

        return view('dashboard.product.create', compact('product_categories'));
    }

    public function store(Request $request)
    {



        //  ($request->all());
        //   $number =     
        //    switch()

        $this->validate($request, [
            'product_name' => 'required',
            'selected_categories' => 'required',
            'description' => 'required',
            'image' => 'required',
            'sales_price' => 'required',
            'stock' => 'required',
            'low_stock' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);



        $data = new Product();

        $data->product_name = $request->product_name;
        $data->product_url = $request->product_url;
        $data->is_top_product = $request->is_top_product;

        $data->selected_categories = $request->selected_categories;
        $data->short_description = $request->short_description;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $data->image = Storage::put('/product_uploads', request()->file('image'));
        }

        $data->cost = $request->cost;
        $data->sales_price = $request->sales_price;

        $data->stock = $request->stock;
        $data->low_stock = $request->low_stock;
        $data->meta_title = $request->meta_title;

        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->schema_tag = $request->schema_tag;
        $data->video_url = $request->video_url;
        $data->save();

        return redirect()->back();
    }

    public function view()
    {
        $all_data = Product::with('product_offers')
            ->withSum('stocks', 'qty')
            ->withSum('orders', 'qty')
            ->paginate(10);
        return view('dashboard.product.index', compact('all_data'));
    }


    public function edit($id)
    {
        $editdata = Product::find($id);
        return view('dashboard.product.edit', compact('editdata'));
    }


    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $data->product_name = $request->product_name;
        $data->product_url = $request->product_url;
        $data->is_top_product = $request->is_top_product;

        $data->selected_categories = $request->selected_categories;
        $data->short_description = $request->short_description;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            if ($data->image && file_exists(public_path($data->image))) {
                if (public_path($data->image)) {
                    unlink(public_path($data->image));
                }
            }
            $data->image = Storage::put('/product_uploads', request()->file('image'));
        }

        $data->cost = $request->cost;
        $data->sales_price = $request->sales_price;

        $data->stock = $request->stock;
        $data->low_stock = $request->low_stock;
        $data->meta_title = $request->meta_title;

        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->schema_tag = $request->schema_tag;
        $data->video_url = $request->video_url;
        $data->save();
        return redirect()->route('dashboard.product.view');
    }

    public function destory($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            if (file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
                $product->delete();
                return redirect()->back();
            } else {
                $product->delete();
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
        return redirect()->back();
    }


    public function discount($id)
    {
        $product_price = ProductOffer::find($id);
        return view('dashboard.product.discount', compact('product_price'));
    }
}
