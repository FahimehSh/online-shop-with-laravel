@extends('home.master')
@section('page-title', 'ارتباط با ما')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('main')}}">صفحه اصلی</a>
                    <span class="breadcrumb-item active">تماس با ما</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid text-right">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">ارتباط با ما</span>
        </h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="نام شما *"
                                   required="required" data-validation-required-message="Please enter your name"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="ایمیل شما *"
                                   required="required" data-validation-required-message="Please enter your email"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="موضوع"
                                   required="required" data-validation-required-message="Please enter a subject"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="پیام *"
                                      required="required"
                                      data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn text-white py-2 px-4" type="submit" id="sendMessageButton"
                                    style="background-color: #e6005c">
                                ارسال
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3215.0442634143524!2d59.55166071892396!3d36.31123344832379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c93d45dac83c3%3A0x5cd1081ffdb1c9bf!2z2KfbjNiy2Ygg2YjbjNiy24zYqiB8IElTTyBWaXNpdA!5e0!3m2!1sen!2sro!4v1668360803017!5m2!1sen!2sro"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">

                    </iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt mr-3" style="color: #e6005c"></i>123 Street, New
                        York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope mr-3" style="color: #e6005c"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt mr-3" style="color: #e6005c"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
