@extends('home.master')

@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <p>
                برای ثبت کالا در سبد خرید و یا ثبت سفارش باید ابتدا وارد سایت شوید.
                <a class="text-danger" href="{{route('login')}}">ورود/</a>
                <a class="text-danger" href="{{route('register')}}">ثبت نام</a>
            </p>
        </div>
    </div>
@endsection
