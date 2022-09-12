@extends('dashboard.master')

@section('page-title', 'لیست سفارش ها')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="info-box">
        @if($orders->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-white" style="background-color: darkblue">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام سفارش دهنده</th>
                        <th scope="col">مبلغ کل سفارش(تومان)</th>
                        <th scope="col">تاریخ ثبت سفارش</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$orders->firstItem() + $loop->index}}</th>
                            <td>{{$order->user->first_name. ' ' .$order->user->last_name}}</td>
                            <td>{{number_format($order->total_price)}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a href=""
                                   class="btn btn-rounded btn-danger"
                                   onclick="return confirm('آیا از حذف این سفارش مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{$orders->links()}}
            </div>
        @else
            <div class="content-header sty-one">
                <h4 class="text-black">سفارشی ثبت نشده است.</h4>
            </div>
        @endif
    </div>
@endsection
