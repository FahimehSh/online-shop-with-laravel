@extends('dashboard.master')

@section('page-title', 'افزودن آدرس')

@section('sidebar-menu')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="true">
                    <div class="card-body">
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
                                        <option disabled selected value>
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
                                        <option disabled selected value>
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
                                    <button class="btn text-white" type="submit" style="background-color: #e6005c">افزودن آدرس</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
