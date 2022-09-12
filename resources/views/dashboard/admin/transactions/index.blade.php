@extends('dashboard.master')

@section('page-title', 'لیست تراکنش ها')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="info-box">
        @if($transactions->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-white" style="background-color: darkblue">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام سفارش دهنده</th>
                        <th scope="col">مبلغ تراکنش(تومان)</th>
                        <th scope="col">تاریخ ثبت تراکنش</th>
                        <th scope="col">کد رهگیری</th>
                        <th scope="col">نام درگاه پرداخت</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">{{$transactions->firstItem() + $loop->index}}</th>
                            <td>{{$transaction->user->first_name. ' ' .$transaction->user->last_name}}</td>
                            <td>{{number_format($transaction->order->total_price)}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>{{$transaction->tracking_code}}</td>
                            <td>{{$transaction->gateway->name}}</td>
                            <td>{{$transaction->status}}</td>
                            <td>
                                <a href=""
                                   class="btn btn-rounded btn-danger"
                                   onclick="return confirm('آیا از حذف این تراکنش مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{$transactions->links()}}
            </div>
        @else
            <div class="content-header sty-one">
                <h4 class="text-black">هیچ تراکنشی ثبت نشده است.</h4>
            </div>
        @endif
    </div>
@endsection
