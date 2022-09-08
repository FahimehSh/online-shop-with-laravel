<!DOCTYPE html>
<html lang="en" style="direction: rtl">

<head>
    <meta charset="utf-8">
    <title>فروشگاه آنلاین - @yield('page-title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/homeStyle/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/homeStyle/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/homeStyle/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-10">
        <div class="col-lg-12 text-lg">
            <div class="d-inline-flex">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My
                        Account
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">ورود</button>
                        <button class="dropdown-item" type="button">خروج</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-light py-3 d-none d-lg-flex text-right">
        <div class="col-lg-6" style="padding-right: 0">
            <a href="{{route('main')}}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary px-2" style="background-color: #141467">فروشگاه</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">آنلاین</span>
            </a>
        </div>
        <div class="col-lg-6 col-8 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="جستجو">
                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid mb-30" style="background-color: #141467">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
               href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>دسته بندی کالاها</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                 id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    @foreach($firstCategories as $category)
                        <div class="nav-item dropdown dropleft">
                            <a href="{{route('shop.productsInCategory', ['slug'=>$category->slug])}}"
                               class="nav-link dropdown-toggle text-right" data-toggle="dropdown">
                                {{$category->title}}
                                <i
                                    class="fa fa-angle-left float-left mt-1">
                                </i>
                            </a>
                            @if(filled($category->children))
                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0 text-right">
                                    @foreach($category->children as $child1)
                                        <a href="{{route('shop.productsInCategory', ['slug'=>$child1->slug])}}"
                                           class="dropdown-item">{{$child1->title}}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-darkblue navbar-dark py-3 py-lg-0 px-0">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('main')}}" class="nav-item nav-link active">صفحه اصلی</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">فروشگاه</a>
                        <a href="detail.html" class="nav-item nav-link">بلاگ</a>
                        <a href="contact.html" class="nav-item nav-link">تماس با ما</a>
                        <a href="contact.html" class="nav-item nav-link">درباره ما</a>
                        @if(!auth()->check())
                            <a href="{{route('register')}}" class="nav-item nav-link">ثبت نام</a>
                            <a href="{{route('login')}}" class="nav-item nav-link">ورود</a>
                        @endif
                        <a href="{{route('logout')}}" class="nav-item nav-link">خروج</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                                  style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="{{route('cart.items')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span id="items-in-cart" class="badge text-secondary border border-secondary rounded-circle"
                                  style="padding-bottom: 2px;">
                                {{filled($cart)?$cartItemsCount:0}}
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
<div class="container-fluid text-secondary mt-5 pt-5 text-right" style="background-color: #141467">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">فروشگاه آنلاین، بررسی، انتخاب و خرید آنلاین</h5>
            <p class="mb-4">
                یک خرید اینترنتی مطمئن، نیازمند فروشگاهی است که بتواند کالاهایی متنوع، باکیفیت و دارای قیمت مناسب را در
                مدت زمانی کوتاه به دست مشتریان خود برساند و ضمانت بازگشت کالا هم داشته باشد؛ ویژگی‌هایی که فروشگاه
                اینترنتی دیجی‌کالا سال‌هاست بر روی آن‌ها کار کرده و توانسته از این طریق مشتریان ثابت خود را داشته باشد.
            </p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary ml-3"></i>123 Street, New York, USA
            </p>
            <p class="mb-2"><i class="fa fa-envelope text-primary ml-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary ml-3"></i>+012 345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-left mr-2"></i>صفحه اصلی</a>
                        <a class="text-secondary mb-2" href="{{route('shop')}}"><i class="fa fa-angle-left mr-2"></i>فروشگاه</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-left mr-2"></i>ارتباط با ما</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-left mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-left mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-left mr-2"></i>Shop Detail</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <p>با ثبت ایمیل، از جدید‌ترین تخفیف‌ها با‌خبر شوید</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ایمیل شما">
                            <div class="input-group-append">
                                <button class="btn btn-primary">ثبت</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">همراه ما باشید!</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                © تمامی حقوق مادی و معنوی این وب سایت به فروشگاه آنلاین تعلق دارد.
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/homeStyle/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('/homeStyle/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('/homeStyle/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('/homeStyle/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('/homeStyle/js/main.js')}}"></script>
</body>

</html>
