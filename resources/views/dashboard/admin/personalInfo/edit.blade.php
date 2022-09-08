@extends('dashboard.master')

@section('page-title', 'ویرایش پروفایل')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="user-profile-box m-b-3 col-lg-6">
                <div class="box-profile text-white">
                    <img class="profile-user-img img-responsive img-circle m-b-2"
                         src="{{$user_pic}}"
                         alt="User profile picture">
                    <h3 class="profile-username text-center">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h3>
                </div>
            </div>
            <div class="info-box">
                <div class="card tab-style1">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="true">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post"
                                      action="{{route('personal.info.update')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="text-black font-weight-bold">بارگذاری
                                                    عکس:</label>
                                                <input type="file" name="images[]" id="exampleInputFile"
                                                       class="col-lg-6"
                                                       accept="img/*" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">نام</label>
                                        <div class="col-md-12">
                                            <input name="first_name"
                                                   value="{{old('first_name', auth()->user()->first_name)}}"
                                                   class="form-control form-control-line"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">نام خانوادگی</label>
                                        <div class="col-md-12">
                                            <input name="last_name"
                                                   value="{{old('last_name', auth()->user()->last_name)}}"
                                                   class="form-control form-control-line"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">رایانامه</label>
                                        <div class="col-md-12">
                                            <input name="email" value="{{old('email', auth()->user()->email)}}"
                                                   class="form-control form-control-line" name="example-email"
                                                   id="example-email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">رمز عبور</label>
                                        <div class="col-md-12">
                                            <input value="{{old('email', auth()->user()->email)}}" name="password"
                                                   class="form-control form-control-line"
                                                   type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">شماره تلفن</label>
                                        <div class="col-md-12">
                                            <input value="{{old('mobile', auth()->user()->mobile)}}" name="mobile"
                                                   class="form-control form-control-line"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">ثبت تغییرات</button>
                                        </div>
                                    </div>
                                </form>


                                <form class="form-horizontal form-material" method="post"
                                      action="{{route('personal-info.address.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputFile" class="text-black font-weight-bold">
                                            افزودن آدرس
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">انتخاب نام استان</label>
                                        <div class="col-md-12">
                                            <select name="state_id" class="form-control">
                                                <option value="{{null}}">
                                                    نام استان خود را انتخاب کنید:
                                                </option>
                                                @foreach($states as $state)
                                                    <option
                                                        value="{{$state->id}}" @selected($state->id==auth()->user()->state_id)>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">انتخاب نام شهر</label>
                                        <div class="col-md-12">
                                            <select name="city_id" class="form-control">
                                                <option value="{{null}}">
                                                    نام شهر خود را انتخاب کنید:
                                                </option>
                                                @foreach($cities as $city)
                                                    <option
                                                        value="{{$city->id}}" @selected($city->id==auth()->user()->city_id)>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">آدرس کامل</label>
                                        <div class="col-md-12">
                                            <input name="detail"
                                                   value="{{old('detail', auth()->user()->detail)}}"
                                                   class="form-control form-control-line"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">کد پستی</label>
                                        <div class="col-md-12">
                                            <input name="postal_code"
                                                   value="{{old('postal_code', auth()->user()->postal_code)}}"
                                                   class="form-control form-control-line"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">افزودن آدرس</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
