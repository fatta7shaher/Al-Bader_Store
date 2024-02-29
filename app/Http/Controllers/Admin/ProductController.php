<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $data['route'] = 'products';
        $data['products'] = Product::select('id', 'category_id', 'name', 'image', 'status', 'trend')->get();
        return view('admin.product.index', $data);
    }


    public function create()
    {
        $data['route'] = 'products';
        $data['categories'] = Category::select('id', 'name')->get();
        return view('admin.product.create', $data);
    }


    public function store(StoreProductRequest $request)
    {
        try {

            $validate = $request->validated();

            $image = $request->file('image')->store('public/assets/uploads/Product');


            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $product->slug = $request->slug;
            $product->short_description = ['ar' => $request->short_description_ar, 'en' => $request->short_description_en];
            $product->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
            $product->status = $request->status ? '1' : '0';
            $product->trend = $request->trend ? '1' : '0';
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->meta_title = $request->meta_title;
            $product->meta_description = ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en];
            $product->meta_keywords = $request->meta_keywords;
            $product->image = $image;
            $product->save();

            return redirect()->route('products.index')->with('success', __('success_save'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error_catch' => $e->getMessage()]);
        }
    }


    public function show(Product $product)
    {
        $data['route'] = 'products';
        $data['product'] = $product;
        return view('admin.product.show', $data);
    }


    public function edit(Product $product)
    {
        $data['route'] = 'products';
        $data['product'] = $product;
        $data['categories'] = Category::select('id', 'name')->get();
        return view('admin.product.edit', $data);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $image = $product->image;

            if ($request->hasFile('image')) {
                Storage::delete($product->image);
                $image = $request->file('image')->store('public/assets/uploads/Product');
            }
            $product->update([
                'category_id' => $request->category_id,
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'slug' => $request->slug,
                'short_description' => ['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'status' => $request->status ? '1' : '0',
                'trend' => $request->trend ? '1' : '0',
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'tax' => $request->tax,
                'meta_title' => $request->meta_title,
                'meta_description_ar' => ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
                'meta_keywords' => $request->meta_keywords,
                'image' => $image,
            ]);
            return redirect()->route('products.index')->with('success', __('success_update'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error_catch' => $e->getMessage()]);
        }
    }


    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success', __('success_delete'));
    }
}
