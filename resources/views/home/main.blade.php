@extends('home.master')
@section('page-title', 'صفحه اصلی')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">

        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1" class=""></li>
                        <li data-target="#header-carousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($headerProducts as $product)

                            <div class="carousel-item position-relative {{($product)==$headerProducts[0]?'active':''}}"
                                 style="height: 430px;">
                                <img class="w-100 h-100"
                                     src="{{filled($product->files)?
asset('storage/uploads/'.$product->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}"
                                     style="object-fit: cover;">
                                <div
                                    class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{$product->title}}</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                            {{$product->meta_title}}
                                        </p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                           href="#">خرید</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">ضمانت اصل بودن کالا</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-credit-card text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">امکان پرداخت در محل</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14 روز ضمانت بازگشت کالا</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">پشتیبانی 24 ساعته در 7 روز هفته</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase text-right  mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">دسته بندی ها</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach($firstCategories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid"
                                     src="{{filled($category->files)?
asset('storage/uploads/'.$category->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{$category->title}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase text-right mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">جدید ترین کالاها</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                 src="{{filled($product->files)?
asset('storage/uploads/'.$product->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}"
                                 alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$product->title}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5>
                                <h6 class="text-muted ml-2">
                                    <del>{{$product->presentPrice()}}</del>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

@endsection
