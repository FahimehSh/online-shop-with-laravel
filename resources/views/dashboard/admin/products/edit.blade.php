@extends('dashboard.master')

@section('page-title', 'ویرایش کالا')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="content-header sty-one">
        <h1 class="text-black">ویرایش کالا</h1>
    </div>
    <div class="info-box">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('products.update', ['product'=>$product->id])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">نام کالا</label>
                        <input class="form-control" id="basicInput" type="text" name="title"
                               value="{{old('title', $product->title)}}">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">توضیحات</label>
                        <input class="form-control" id="basicInput" type="text" name="meta_title"
                               value="{{old('meta_title', $product->meta_title)}}">
                    </fieldset>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="text-black font-weight-bold">معرفی محصول</label>
                            <textarea name="introduction" class="form-control" id="placeTextarea" rows="5"
                                      placeholder="معرفی محصول ...">
                                "{{old('introduction', $product->introduction)}}"
                            </textarea>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب برند:</label>
                                <select name="brand_id" class="form-control">
                                    <option value="{{null}}">نام برند مورد نظرتان را انتخاب کنید:
                                    </option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{$brand->id}}" @selected($product->brand_id==$brand->id)>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب فروشنده:</label>
                                <select name="supplier_id" class="form-control">
                                    <option value="{{null}}">نام فروشنده مورد نظرتان را انتخاب کنید:
                                    </option>
                                    @foreach($suppliers as $supplier)
                                        <option
                                            value="{{$supplier->id}}" @selected($product->supplier_id==$supplier->id)>{{$supplier->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب تخفیف مورد نظر:</label>
                                <select name="discount_id" class="form-control">
                                    <option value="{{null}}">تخفیفی که می خواهید برای این محصول فعال شود را انتخاب کنید:
                                    </option>
                                    @foreach($discounts as $discount)
                                        <option
                                            value="{{$discount->id}}" @selected($product->discount_id==$discount->id)>{{$discount->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب دسته بندی:</label>
                                <ul>
                                    @foreach($firstCategories as $category)
                                        <div class="radio">
                                            <input type="radio" name="parent_category" id="optionsRadios1"
                                                   value="{{$category->id}}"
                                                   @if(in_array($category->id, $product->categories->pluck('id')->toArray())) checked @endif>
                                            {{ $category->title }}
                                            @if(filled($category->children))
                                                <select name="child_category" class="form-control">--}}
                                                    <option value="{{null}}">زیر دسته بندی مورد نظر خود را انتخاب
                                                        کنید:
                                                    </option>
                                                    @foreach($category->children as $child)
                                                        <option
                                                            value="{{$child->id}}" @selected(in_array($child->id, $product->categories->pluck('id')->toArray()))>{{$child->title}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">قیمت کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="price"
                                       value="{{old('price', $product->presentPrice())}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">تعداد کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="quantity"
                                       value="{{old('quantity', $product->quantity)}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">SKU</label>
                                <input class="form-control" id="basicInput" type="text" name="quantity"
                                       value="{{old('sku', $product->sku)}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputFile" class="text-black font-weight-bold">
                                    عکس های این کالا
                                </label>
                                <div>
                                    @if(count($product->files))
                                        <div class="row">
                                            @foreach($images as $image)
                                                <div>
                                                    <div class="col-lg-3">
                                                        <img src="{{asset('storage/uploads/'.$image->name)}}"
                                                             alt="category image"
                                                             style="width: 200px;height: auto">
                                                    </div>
                                                    <div class="mt-2">
                                                        <a
                                                            href="{{route('products.destroy.file', ['product'=>$product->id, 'file'=>$image->id])}}"
                                                            class="btn btn-rounded fa fa-trash btn-danger pull-left"
                                                            onclick="return confirm('آیا از حذف این تصویر مطمئن هستید؟')">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>این کالا هنوز عکسی ندارد.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputFile" class="text-black font-weight-bold">بارگذاری عکس:</label>
                                <input type="file" name="images[]" id="exampleInputFile" class="col-lg-6" accept="img/*"
                                       multiple>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary pull-left">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
