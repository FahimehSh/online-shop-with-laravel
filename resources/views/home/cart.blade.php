@extends('home.master')

@section('page-title', 'سبد خرید')

@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                    <tr>
                        <th>کالاها</th>
                        <th>قیمت(تومان)</th>
                        <th>تعداد</th>
                        <th>مبلغ کل(تومان)</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($cart_items as $cart_item)
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">
                                {{$cart_item->products->title}}
                            </td>
                            <td class="align-middle">{{$cart_item->price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                           class="form-control form-control-sm bg-secondary border-0 text-center"
                                           value="{{$cart_item->quantity}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150</td>
                            <td class="align-middle">
                                <a href="{{route('destroy.cartItem', ['product'=>$cart_item->product_id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="کد تخفیف خود را وارد کنید.">
                        <div class="input-group-append">
                            <button class="btn btn-primary">ثبت</button>
                        </div>
                    </div>
                </form>

                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>قیمت کالاها(تومان)</h6>
                            <h6>150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">هزینه حمل و نقل(تومان)</h6>
                            <h6 class="font-weight-medium">10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>هزینه کل(تومان)</h5>
                            <h5>160</h5>
                        </div>
                        <button class="btn btn-block btn-danger font-weight-bold my-3 py-3">ادامه</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
