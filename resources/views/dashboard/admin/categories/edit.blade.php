@extends('dashboard.master')

@section('page-title', 'ویرایش دسته بندی')

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
        <h1 class="text-black">ویرایش دسته بندی</h1>
    </div>
    <div class="info-box">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('categories.update', ['category'=>$category->slug])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">نام دسته بندی</label>
                        <input class="form-control" id="basicInput" type="text" name="title"
                               value="{{old('title', $category->title)}}">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="text-black font-weight-bold">توضیحات</label>
                        <input class="form-control" id="basicInput" type="text" name="meta_title"
                               value="{{old('meta_title', $category->meta_title)}}">
                    </fieldset>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="text-black font-weight-bold">انتخاب دسته بندی:</label>
                                <select name="parent_id" class="form-control">
                                    <option disabled selected value>در صورتی که این دسته بندی در داخل دسته بندی دیگری
                                        قرار
                                        دارد، انتخاب کنید:
                                    </option>
                                    @foreach($categories as $cat)
                                        @if($cat->id != $category->id)
                                            <option
                                                value="{{$cat->id}}" @selected($category->parent_id==$cat->id)>{{$cat->title}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputFile" class="text-black font-weight-bold">عکس های این دسته
                                    بندی:</label>
                                <div>
                                    @if(filled($category->files))
                                        @foreach($images as $image)
                                            <img src="{{asset('storage/uploads/'.$image->name)}}" alt="category image"
                                                 style="width: 200px;height: auto">
                                        @endforeach
                                    @else
                                        <p>این دسته بندی هنوز عکسی ندارد.</p>
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
                    <button type="submit" class="btn text-white pull-left" style="background-color: #e6005c">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
