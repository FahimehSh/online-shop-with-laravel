@extends('home.master')

@section('page-title', 'صفحه پرداخت')

@section('content')
    <div class="container-fluid text-right">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">آدرس سفارش شما</span>
                </h5>
                <div class="bg-light p-30 mb-5">

                    <form action="{{route('personal-info.address.update')}}" method="post">
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
                                       vlaue="{{old('detail', auth()->user()->addresses->first()->detail)}}"
                                       placeholder="{{old('detail', auth()->user()->addresses->first()->detail)}}"
                                       class="form-control" type="text">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>کد پستی</label>
                                <input name="postal_code"
                                       vlaue="{{old('postal_code', auth()->user()->addresses->first()->postal_code)}}"
                                       placeholder="{{old('postal_code', auth()->user()->addresses->first()->postal_code)}}"
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
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">سفارش کل</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>قیمت کل کالاها</h6>
                            <h6>{{number_format($subTotalPrice)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">هزینه حمل و نقل</h6>
                            <h6 class="font-weight-medium">{{number_format(25000)}}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>مبلغ کل سفارش</h5>
                            <h5>{{number_format($subTotalPrice + 25000)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">درگاه پرداخت</span>
                    </h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" selected>
                                <label class="custom-control-label" for="paypal">زرین پال</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">شاپرک</label>
                            </div>
                        </div>
                        <a href="{{route('order.store')}}" class="btn btn-block btn-primary font-weight-bold py-3">ثبت سفارش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
