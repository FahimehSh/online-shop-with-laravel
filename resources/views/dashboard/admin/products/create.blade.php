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
                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">نام کالا</label>
                        <input class="form-control" id="basicInput" type="text" name="title" value="{{old('title')}}">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">توضیحات</label>
                        <input class="form-control" id="basicInput" type="text" name="meta_title"
                               value="{{old('meta_title')}}">
                    </fieldset>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="text-black font-weight-bold">معرفی محصول</label>
                            <textarea name="introduction" class="form-control" id="placeTextarea" rows="5"
                                      placeholder="معرفی محصول ..."></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="text-black font-weight-bold">افزودن ویژگی ها:</label>
                            <div class="table-responsive col-lg-6">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th>نام ویژگی</th>
                                        <th>مقدار ویژگی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i = 1; $i <= 5; $i ++ )
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                <input class="form-control" type="text" name="attribute_names[]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="attribute_values[]">
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب برند:</label>
                                <select name="brand_id" class="form-control">
                                    <option disabled selected value>نام برند مورد نظرتان را انتخاب کنید:
                                    </option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
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
                                    <option disabled selected value>
                                        نام فروشنده مورد نظرتان را انتخاب کنید:
                                    </option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->description}}</option>
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
                                    <option disabled selected value>تخفیفی که می خواهید برای این محصول فعال شود را
                                        انتخاب کنید:
                                    </option>
                                    @foreach($discounts as $discount)
                                        <option value="{{$discount->id}}">{{$discount->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب دسته بندی:</label>
                                @foreach($firstCategories as $category)
                                    <div class="form-group">
                                        <div class="radio">
                                            <input type="radio" name="parent_category"
                                                   value="{{$category->id}}">
                                            {{ $category->title }}
                                        </div>
                                        @if(count($category->children))
                                            <label>
                                                زیر دسته بندی مورد نظر خود را انتخاب کنید:
                                            </label>
                                            <select name="child_category" class="form-control">
                                                <option disabled selected value>
                                                    زیر دسته بندی مورد نظر خود را انتخاب کنید
                                                </option>
                                                @foreach($category->children as $child)
                                                    <option value="{{$child->id}}">{{$child->title}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">قیمت کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="price"
                                       value="{{old('price')}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">تعداد کالا</label>
                                <input class="form-control" id="basicInput" type="text" name="quantity"
                                       value="{{old('quantity')}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="text-black font-weight-bold">SKU</label>
                                <input class="form-control" id="basicInput" type="text" name="sku"
                                       value="{{old('sku')}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputFile" class="text-black font-weight-bold">بارگذاری عکس:</label>
                                <input type="file" name="images[]" id="exampleInputFile" class="col-lg-6" accept="img/*"
                                       multiple required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-black font-weight-bold">آیا کالا در سایت قابل دسترس باشد:</label>
                                <label for="optionsRadios1" class="text-black font-weight-bold">بله</label>
                                <input type="radio" name="is_available" id="optionsRadios1" value="1">
                                <label for="optionsRadios2" class="text-black font-weight-bold">خیر</label>
                                <input type="radio" name="is_available" id="optionsRadios2" value="0" checked>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary pull-left">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
