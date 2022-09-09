@extends('dashboard.master')

@section('page-title', 'لیست دسته بندی ها')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="content-header sty-one">
        <h1 class="text-black">مدیریت دسته بندی ها</h1>
    </div>
    <div class="info-box">
        @if($categories->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-white" style="background-color: darkblue">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عکس دسته بندی</th>
                        <th scope="col">نام دسته بندی</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$categories->firstItem() + $loop->index}}</th>
                            <td><img src="{{filled($category->files)?asset('storage/uploads/'.$category->files->first()->name):asset('dashboardStyle/dist/img/body-bg.jpg')}}" style="width: 80px;height: auto"></td>
                            <td>{{$category->title}}</td>
                            <td>{{mb_substr($category->meta_title, 0 , 20). '...'}}</td>
                            <td>
                                <a class="btn btn-rounded btn-success text-white"
                                   href="{{route('categories.edit', ['category'=>$category->slug])}}">ویرایش</a>
                                <a href="{{route('categories.destroy', ['category'=>$category->slug])}}"
                                   class="btn btn-rounded btn-danger"
                                   onclick="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{$categories->links()}}
            </div>
        @else
            <div class="content-header sty-one">
                <h4 class="text-black">دسته بندی دیگری وجود ندارد.</h4>
            </div>
        @endif
    </div>
@endsection
