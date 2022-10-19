@extends('home.master')

@section('page-title', 'صفحه پرداخت')

@section('content')
    <div class="container-fluid text-right">
        <div class="row px-xl-5">
            <div class="col-lg-8">

                @if($address!=null)
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">آدرس سفارش شما</span>
                    </h5>
                    <div class="bg-light p-30 mb-5">

                        <form action="{{route('personal-info.address.update', ['address'=>$address])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>نام استان</label>

                                    <select name="state_id" class="form-control">
                                        <option>نام استان خود را انتخاب کنید:</option>
                                        @foreach($states as $state)
                                            <option
                                                value="{{$state->id}}"
                                                @selected($state->id==$address->state_id)>{{$state->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label>نام شهر</label>

                                    <select name="city_id" class="form-control">
                                        <option>نام شهر خود را انتخاب کنید:</option>
                                        @foreach($cities as $city)
                                            <option
                                                value="{{$city->id}}"
                                                @selected($city->id==$address->city_id)>{{$city->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-12 form-group">
                                    <label>آدرس</label>
                                    <input name="detail"
                                           vlaue="{{old('detail', $address->detail)}}"
                                           placeholder="{{old('detail', $address->detail)}}"
                                           class="form-control" type="text">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>کد پستی</label>
                                    <input name="postal_code"
                                           vlaue="{{old('postal_code', $address->postal_code)}}"
                                           placeholder="{{old('postal_code', $address->postal_code)}}"
                                           class="form-control" type="text">
                                </div>
                                <div class="col-md-6 form-group">
                                    <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">تغییر
                                        آدرس
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                       data-target="#shipping-address">انتقال به آدرس دیگر</label>
                            </div>
                        </div>

                    </div>
                    <div class="collapse mb-5" id="shipping-address">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">آدرس جدید</span>
                        </h5>
                        <div class="bg-light p-30">

                            <form action="{{route('personal-info.address.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>نام استان</label>

                                        <select name="state_id" class="form-control">
                                            <option>نام استان خود را انتخاب کنید:</option>
                                            @foreach($states as $state)
                                                <option
                                                    value="{{$state->id}}"
                                                    @selected($state->id==auth()->user()->addresses->first()->state_id)>{{$state->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>نام شهر</label>

                                        <select name="city_id" class="form-control">
                                            <option>نام شهر خود را انتخاب کنید:</option>
                                            @foreach($cities as $city)
                                                <option
                                                    value="{{$city->id}}"
                                                    @selected($city->id==auth()->user()->addresses->first()->city_id)>{{$city->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>آدرس</label>
                                        <input name="detail"
                                               vlaue="{{old('detail')}}"
                                               class="form-control" type="text">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>کد پستی</label>
                                        <input name="postal_code"
                                               vlaue="{{old('postal_code')}}"
                                               class="form-control" type="text">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">
                                            افزودن آدرس جدید
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                @else
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">افزودن آدرس</span>
                    </h5>
                    <div class="bg-light p-30">

                        <form
                            action="{{auth()->user()->is_admin == 1?route('personal-info.address.store'):route('user.personal-info.address.store')}}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>نام استان</label>

                                    <select name="state_id" class="form-control">
                                        <option>نام استان خود را انتخاب کنید:</option>
                                        @foreach($states as $state)
                                            <option
                                                value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label>نام شهر</label>

                                    <select name="city_id" class="form-control">
                                        <option>نام شهر خود را انتخاب کنید:</option>
                                        @foreach($cities as $city)
                                            <option
                                                value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-12 form-group">
                                    <label>آدرس</label>
                                    <input name="detail"
                                           vlaue="{{old('detail')}}"
                                           class="form-control" type="text">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>کد پستی</label>
                                    <input name="postal_code"
                                           vlaue="{{old('postal_code')}}"
                                           class="form-control" type="text">
                                </div>
                                <div class="col-md-6 form-group">
                                    <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">
                                        افزودن آدرس جدید
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>

                @endif
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">سفارش کل</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>قیمت کل کالاها</h6>
                            <h6>{{number_format($subTotalPrice - $sumTotalDiscount)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">هزینه حمل و نقل</h6>
                            <h6 class="font-weight-medium">{{number_format(25000)}}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>مبلغ کل سفارش</h5>
                            <h5>{{number_format($subTotalPrice - $sumTotalDiscount + 25000)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">درگاه پرداخت</span>
                    </h5>
                    <div class="bg-light p-30">
                        <form method="post" action="{{route('order.store')}}">
                            @csrf
                            <div class="form-group">
                                @foreach($gateways as $gateway)
                                    <div>
                                        <input type="radio" name="gateway_id"
                                               value="{{$gateway->id}}">
                                        <label>{{$gateway->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">ثبت
                                سفارش
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
