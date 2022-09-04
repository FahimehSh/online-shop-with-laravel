@extends('dashboard.master')

@section('page-title', 'افزودن کالای جدید')

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
        <h1 class="text-black">افزودن کالای جدید</h1>
    </div>
    <div class="info-box">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('products.update', ['product'=>$product->id])}}" enctype="multipart/form-data">
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
                                        <option value="{{$brand->id}}" @selected($product->brand_id==$brand->id)>{{$brand->title}}</option>
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
                                        <option value="{{$supplier->id}}" @selected($product->supplier_id==$supplier->id)>{{$supplier->description}}</option>
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
                                        <option value="{{$discount->id}}" @selected($product->discount_id==$discount->id)>{{$discount->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب دسته بندی:</label>
                                <select name="parent_id" class="form-control">
                                    <option value="{{null}}">دسته بندی مورد نظر خود را انتخاب کنید:
                                    </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">قیمت کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="price" value="{{old('price', $product->price)}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">تعداد کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="quantity" value="{{old('quantity', $product->quantity)}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputFile" class="text-black font-weight-bold">بارگذاری عکس:</label>
                                <input type="file" name="images[]" id="exampleInputFile" class="col-lg-6" accept="img/*" multiple required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary pull-left">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection