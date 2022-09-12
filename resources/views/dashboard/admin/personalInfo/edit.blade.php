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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
