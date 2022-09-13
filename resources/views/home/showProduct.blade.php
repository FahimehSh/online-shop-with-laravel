@extends('home.master')

@section('page-title', $product->title)

@section('content')
    <div class="container-fluid pb-5">
        <div class="row">
            @if(!auth()->check())
                <p>
                    برای ثبت کالا در سبد خرید و یا ثبت سفارش باید ابتدا وارد سایت شوید.
                    <a class="text-danger" href="{{route('login')}}">ورود/</a>
                    <a class="text-danger" href="{{route('register')}}">ثبت نام</a>
                </p>
            @endif
        </div>
        <div class="row  px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @foreach($product->files as $file)
                            <div class="carousel-item {{($file)==$product->files[0]?'active':''}}">
                                <img class="w-100 h-100" src={{filled($file)?
asset('storage/uploads/'.$file->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}} alt="Image">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30 text-right">
                <div class="h-100 bg-light p-30">
                    <h3>{{$product->title}}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 دیدگاه)</small>
                    </div>
                    @if(filled($product->discount))
                        <del class="font-weight-bold mb-4 text-muted">{{$product->presentPrice()}} تومان</del>
                        <h5>{{(filled($product->discount))?number_format($product->price - $product->discount->amount):''}}
                            تومان</h5>
                    @else
                        <h3 class="font-weight-semi-bold mb-4">{{$product->presentPrice()}} تومان</h3>
                    @endif
                    <p class="mb-4">
                        {{$product->meta_title}}
                    </p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">سایزها:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-1" name="size">
                                <label class="custom-control-label" for="size-1">XS</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">رنگ ها:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">صورتی</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-plus"
                                   href="">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <a class="btn btn-danger px-3" href="{{route('add.to.cart', ['product'=>$product->id])}}">
                            <i class="fa fa-shopping-cart mr-1"></i>
                            افزودن به سبد خرید
                        </a>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">اشتراک گذاری:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                           href="#tab-pane-1">معرفی</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">مشخصات</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">دیدگاه ها (0)</a>
                    </div>
                    <div class="tab-content text-right">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">معرفی محصول</h4>
                            <h5>
                                {{$product->introduction}}
                            </h5>

                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>

                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        @foreach($product->attributes as $attribute)
                                            <li class="list-group-item px-0">
                                                {{$attribute->attribute_name. ': ' .$attribute->attribute_value}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                             style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked
                                        *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase text-right mx-xl-5 mb-4">
                <span class="bg-secondary pr-3">کالاهای مشابه</span>
            </h2>
            <div class="row px-xl-5">
                @foreach($mightAlsoLike as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100"
                                     src="{{filled($item->files)?
asset('storage/uploads/'.$item->files->first()->name):
asset('dashboardStyle/dist/img/body-bg.jpg')}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"
                                       href="{{route('add.to.cart', ['product'=>$product->id])}}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                   href="{{route('show.product',['product'=>$item->id])}}">{{$item->title}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>12300</h5>
                                    <h6 class="text-muted ml-2">
                                        <del>{{$item->presentPrice()}}</del>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
