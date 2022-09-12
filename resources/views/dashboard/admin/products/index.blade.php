@extends('dashboard.master')

@section('page-title', 'لیست کالاها')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="content-header sty-one">
        <h1 class="text-black">مدیریت کالاها</h1>
    </div>
    <div class="info-box">
        @if($products->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-white" style="background-color: darkblue">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عکس کالا</th>
                        <th scope="col">نام کالا</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">نام برند</th>
                        <th scope="col">قیمت(تومان)</th>
                        <th scope="col">مقدار تخفیف</th>
                        <th scope="col">موجودی</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$products->firstItem() + $loop->index}}</th>
                            <td><img src="{{filled($product->files)?
asset('storage/uploads/'.$product->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}" style="width: 80px;height: auto"></td>
                            <td>{{$product->title}}</td>
                            <td>{{mb_substr($product->meta_title, 0 , 20). '...'}}</td>
                            <td>{{filled($product->brand_id)?$product->brand->title:''}}</td>
                            <td>{{$product->presentPrice()}}</td>
                            <td>{{(filled($product->discount))?$product->discount->amount:''}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a class="btn btn-rounded btn-success text-white"
                                   href="{{route('products.edit', ['product'=>$product->slug])}}">ویرایش</a>
                                <a href="{{route('products.destroy', ['product'=>$product->id])}}"
                                   class="btn btn-rounded btn-danger"
                                   onclick="return confirm('آیا از حذف این کالا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{$products->links()}}
            </div>
        @else
            <div class="content-header sty-one">
                <h4 class="text-black">کالای دیگری وجود ندارد.</h4>
            </div>
        @endif
    </div>
@endsection
