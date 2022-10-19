<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request, Product $product)
    {
        $attr_names = $request->attribute_names;
        $attr_values = $request->attribute_values;

        if (filled($attr_names) && filled($attr_values) && count($attr_names) == count($attr_values)) {
            for ($i = 1; $i <= count($attr_names); $i++) {
                if ($attr_names[$i] != null) {
                    $attribute = new Attribute();
                    $attribute->product_id = $product->id;
                    $attribute->attribute_name = $attr_names[$i];
                    $attribute->attribute_value = $attr_values[$i];
                    $attribute->save();
                }
            }
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, Product $product)
    {
        $attr_names = $request->attribute_names;
        $attr_values = $request->attribute_values;

        if (filled($attr_names) && filled($attr_values) && count($attr_names) == count($attr_values)) {
            for ($i = 0; $i < count($attr_names); $i++) {
                if ($attr_names[$i] != null) {
                    if (Attribute::query()->where('product_id', $product->id)->where('attribute_name', $attr_names[$i])->exists()) {
                        $attribute = Attribute::query()->where('product_id', $product->id)->where('attribute_name', $attr_names[$i])->first();
                        $attribute->attribute_value = $attr_values[$i];
                        $attribute->save();
                    } else {
                        $attribute = new Attribute();
                        $attribute->product_id = $product->id;
                        $attribute->attribute_name = $attr_names[$i];
                        $attribute->attribute_value = $attr_values[$i];
                        $attribute->save();
                    }
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return back();
    }
}
