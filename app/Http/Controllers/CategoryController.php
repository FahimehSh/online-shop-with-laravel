<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view('dashboard.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'parent_id' => $request->parent_id
        ]);

        if (filled($request->images)) {
            foreach ($request->images as $image) {
                $public_path = 'public/uploads';
                uploadFiles($category, $image, $public_path);
            }
        }
        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $images = $category->files()->get();
        return view('dashboard.admin.categories.edit', compact('category', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->slug = null;
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->parent_id = $request->parent_id;
        $category->save();

        if (filled($request->images)) {
            foreach ($request->images as $image) {
                $public_path = 'public/uploads';
                uploadFiles($category, $image, $public_path);
            }
        }

        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->files()->delete();
        $category->delete();
        return Redirect::route('categories.index');
    }
}
