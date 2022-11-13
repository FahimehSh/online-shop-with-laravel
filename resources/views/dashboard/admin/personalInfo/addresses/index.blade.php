@extends('dashboard.master')

@section('page-title', 'لیست آدرس ها')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="content-header sty-one">
                <h1 class="text-black">لیست آدرس ها</h1>
            </div>
            @if(filled(auth()->user()->addresses))
                @foreach($addresses as $address)
                    <div class="info-box">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="true">
                                <div class="card-body">
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <label class="text-black font-weight-bold">نام استان:</label>
                                            <strong>{{$address->state->name}}</strong>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <label class="text-black font-weight-bold">نام شهر:</label>
                                            <strong>{{$address->city->name}}</strong>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <label class="text-black font-weight-bold">آدرس کامل:</label>
                                            <strong>{{$address->detail}}</strong>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <label class="text-black font-weight-bold">کد پستی:</label>
                                            <strong>{{$address->postal_code}}</strong>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="{{route('personal-info.address.edit', ['address'=>$address->id])}}"
                                           class="btn btn-success">ویرایش</a>
                                        <a href="{{route('personal-info.address.destroy', ['address'=>$address->id])}}"
                                           onclick="return confirm('آیا از حذف این آدرس مطمئن هستید؟')"
                                           class="btn btn-danger">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="content-header sty-one">
                    <h1 class="text-black">هنوز آدرسی ثبت نکرده اید.</h1>
                </div>
            @endif
        </div>
    </div>
@endsection
