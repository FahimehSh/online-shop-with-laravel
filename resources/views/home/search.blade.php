@extends('home.master')

@section('page-title', 'نتایج جستجو')

@section('content')
    @if($products->isNotEmpty() || $articles->isNotEmpty())
        @if($products->isNotEmpty())
            <div class="container-fluid pt-5">
                <h2 class="section-title position-relative text-uppercase text-right  mx-xl-5 mb-4">
            <span
                class="bg-secondary pr-3">محصولات</span>
                </h2>
                <div class="row px-xl-5 pb-3">
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
                                        <a class="btn btn-outline-dark btn-square"
                                           href="{{route('add.to.cart', ['product'=>$product->slug])}}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                       href="{{route('show.product',['product'=>$product->slug])}}">{{$product->title}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        @if(filled($product->discount))
                                            <h6 class="text-muted ml-2">
                                                <del>{{$product->presentPrice()}}</del>
                                            </h6>
                                            <h5>{{number_format($product->price - $product->discount->amount)}}
                                                تومان</h5>
                                        @else
                                            <h5>{{$product->presentPrice()}} تومان</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if($articles->isNotEmpty())
            <div class="container-fluid pt-5">
                <h2 class="section-title position-relative text-uppercase text-right  mx-xl-5 mb-4">
            <span
                class="bg-secondary pr-3">مقاله ها</span>
                </h2>
                <div class="row px-xl-5 pb-3">
                    @foreach($articles as $article)
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100"
                                         src="{{filled($article->files)?
asset('storage/uploads/'.$article->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}"
                                         alt="">
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{$article->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @else
        <div class="container-fluid pt-5">
            <h2 class="section-title position-relative text-uppercase text-right  mx-xl-5 mb-4">
            <span
                class="bg-secondary pr-3">متاسفانه جستجوی شما نتیجه‌ای در بر نداشت.</span>
            </h2>
            <div class="row px-xl-5 pb-3">
            </div>
        </div>
    @endif
@endsection
