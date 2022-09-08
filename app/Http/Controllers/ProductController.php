<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::query()->paginate(10),
        ];

        return view('dashboard.admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'introduction' => $request->introduction,
            'brand_id' => $request->brand_id,
            'supplier_id' => $request->supplier_id,
            'discount_id' => $request->discount_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sku' => $request->sku
        ]);

        if(filled($request->child_category)){
            $parent_category_id = Category::query()->find($request->child_category)->parent_id;
            $product->categories()->attach([$parent_category_id, $request->child_category]);
        }

        $product->categories()->attach($request->parent_category);

        if (filled($request->images)) {
            foreach ($request->images as $image) {
                $public_path = 'public/uploads';
                uploadFiles($product, $image, $public_path);
            }
        }
        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();
        $images = $product->files()->get();
        return view('dashboard.admin.products.edit', compact('product', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->slug = null;
        $product->title = $request->title;
        $product->meta_title = $request->meta_title;
        $product->introduction = $request->introduction;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->discount_id = $request->discount_id;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->save();

        if(filled($request->child_category)){
            $parent_category_id = Category::query()->find($request->child_category)->parent_id;
            $product->categories()->sync([$parent_category_id, $request->child_category]);
        }

        $product->categories()->sync($request->parent_category);

        if (filled($request->images)) {
            foreach ($request->images as $image) {
                $public_path = 'public/uploads';
                uploadFiles($product, $image, $public_path);
            }
        }

        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->files()->delete();
        $product->categories()->detach();
        $product->delete();
        return Redirect::route('products.index');
    }
}
