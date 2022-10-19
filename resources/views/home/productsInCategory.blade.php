@extends('home.master')

@section('page-title', $category->title)

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-toggle="dropdown">Sorting
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($listProductsInCategory->count()===0)
                        <tr>
                            <h4>هیچ کالایی برای نمایش وجود ندارد.</h4>
                        </tr>
                    @endif
                    @foreach($listProductsInCategory as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100"
                                         src="{{filled($product->files)?
asset('storage/uploads/'.$product->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}"
                                         alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="{{route('add.to.cart', ['product'=>$product->slug])}}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{$product->title}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        @if(filled($product->discount))
                                            <h6 class="text-muted ml-2">
                                                <del>{{$product->presentPrice()}}</del>
                                            </h6>
                                            <h5>{{number_format($product->price - $product->discount->amount)}} تومان</h5>
                                        @else
                                            <h5>{{$product->presentPrice()}} تومان</h5>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <div class="row">
                            {{$listProductsInCategory->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->

            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4 text-right">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span>
                </h5>
                <div class="bg-light p-4 mb-30">

                </div>
                <!-- Price End -->

                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
