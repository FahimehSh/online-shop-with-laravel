@extends('dashboard.master')

@section('page-title', 'پروفایل')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="user-profile-box m-b-3 col-lg-6">
                <div class="box-profile text-white">
                    <img class="profile-user-img img-responsive img-circle m-b-2"
                         src="{{filled(auth()->user()->files)?
asset('storage/uploads/'.auth()->user()->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}"
                         alt="User profile picture">
                    <h3 class="profile-username text-center">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h3>
                </div>
            </div>
            <div class="info-box">
                <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5" style="margin-left: 10px"></i>نام و نام
                        خانوادگی</strong>
                    <p class="text-muted">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</p>
                    <hr>
                    <strong><i class="fa fa-envelope margin-r-5" style="margin-left: 10px"></i>رایانامه</strong>
                    <p class="text-muted">{{auth()->user()->email}}</p>
                    <hr>
                    <strong><i class="fa fa-phone margin-r-5" style="margin-left: 10px"></i>شماره تلفن</strong>
                    <p>{{auth()->user()->mobile}}</p>
                    <hr>
                    @if(!is_null(auth()->user()->address_id))
                        <strong><i class="fa fa-envelope margin-r-5" style="margin-left: 10px"></i>نام استان</strong>
                        <p class="text-muted">{{auth()->user()->addresses->first()->state_id}}</p>
                        <hr>
                        <strong><i class="fa fa-envelope margin-r-5" style="margin-left: 10px"></i>نام شهر</strong>
                        <p class="text-muted">{{auth()->user()->addresses->first()->city_id}}</p>
                        <hr>
                        <strong><i class="fa fa-envelope margin-r-5" style="margin-left: 10px"></i>آدرس کامل</strong>
                        <p class="text-muted">{{auth()->user()->addresses->first()->detail}}</p>
                        <hr>
                        <strong><i class="fa margin-r-5" style="margin-left: 10px"></i>کد پستی</strong>
                        <p class="text-muted">{{auth()->user()->addresses->first()->postal_code}}</p>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <a class="btn btn-success" href="{{route('personal-info.edit')}}">ویرایش حساب کاربری</a>
            </div>
        </div>
    </div>
@endsection
