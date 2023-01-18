@extends('layouts.frontend.app')
@section('frontend_content')
    <!-- ============================
            Slider
        ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0"
            data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
            <div class="slide-item align-v-h">
                <div class="bg-img"><img src="{{ asset('assets/frontend/assets/images/sliders/1.jpg') }}" alt="slide img">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__content">
                                <h2 class="slide__title">Providing Best Hospital Services</h2>
                                <p class="slide__desc">The health and well-being of our patients and their health care team
                                    will
                                    always be our priority, so we follow the best practices for cleanliness.</p>
                                <ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
                                    <!-- feature item #1 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-heart"></i>
                                        </div>
                                        <h2 class="feature__title">Examination</h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #2 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-medicine"></i>
                                        </div>
                                        <h2 class="feature__title">Prescription </h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #3 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-heart2"></i>
                                        </div>
                                        <h2 class="feature__title">Cardiogram</h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #4 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-blood-test"></i>
                                        </div>
                                        <h2 class="feature__title">Blood Pressure</h2>
                                    </li><!-- /.feature-item-->
                                </ul><!-- /.features-list -->
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h">
                <div class="bg-img"><img src="{{ asset('assets/frontend/assets/images/sliders/2.jpg') }}" alt="slide img">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__content">
                                <h2 class="slide__title">All Aspects Of Medical Practice</h2>
                                <p class="slide__desc">The health and well-being of our patients and their health care team
                                    will
                                    always be our priority, so we follow the best practices for cleanliness.</p>
                                <ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
                                    <!-- feature item #1 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-heart"></i>
                                        </div>
                                        <h2 class="feature__title">Examination</h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #2 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-medicine"></i>
                                        </div>
                                        <h2 class="feature__title">Prescription </h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #3 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-heart2"></i>
                                        </div>
                                        <h2 class="feature__title">Cardiogram</h2>
                                    </li><!-- /.feature-item-->
                                    <!-- feature item #4 -->
                                    <li class="feature-item">
                                        <div class="feature__icon">
                                            <i class="icon-blood-test"></i>
                                        </div>
                                        <h2 class="feature__title">Blood Pressure</h2>
                                    </li><!-- /.feature-item-->
                                </ul><!-- /.features-list -->
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
        </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ======================
            Hospitals
          ========================= -->
    <section class="team-layout2 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-40">
                        <h3 class="heading__title">Here All Hospitals</h3>
                        <p class="heading__desc">Find your rechabale hospitals from here, Take your best treatment from any
                            hospitals
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                        data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <!-- Member #1 -->
                        @foreach ($hospitals as $hospital)
                            <div class="member">
                                <div class="member__img">
                                    <img src="{{ asset('uploads/hospital/thumbnail/' . $hospital->thumbnail) }}"
                                        alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a
                                            href="{{ route('single.category',$hospital->id) }}">{{ $hospital->name }}</a></h5>
                                    <p class="member__desc">{{ strip_tags(Str::limit($hospital->description, 120)) }}</p>
                                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                        <a href="{{ route('single.category',$hospital->id) }}"
                                            class="btn btn__secondary btn__link btn__rounded">
                                            <span>Read More</span>
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                        <ul class="social-icons list-unstyled mb-0">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                        </ul><!-- /.social-icons -->
                                    </div>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                        @endforeach
                    </div><!-- /.carousel -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Team -->
    <!-- ========================
        About Layout 2
        =========================== -->
    <section class="about-layout2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-60">Improving The Quality Of Your <br> Life Through Better Health.</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="text-with-icon">
                        <div class="text__icon">
                            <i class="icon-doctor"></i>
                        </div>
                        <div class="text__content">
                            <p class="heading__desc font-weight-bold color-secondary mb-30">Our goal is to deliver quality
                                of care
                                in a courteous, respectful, and
                                compassionate manner. We hope you will allow us to care for you and strive to be the first
                                and best
                                choice for healthcare.
                            </p>

                        </div>
                    </div>
                    <div class="video-banner-layout2 bg-overlay">
                        <img src="{{ asset('assets/frontend/assets/images/about/2.jpg') }}" alt="about"
                            class="w-100">

                    </div><!-- /.video-banner -->
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="about__text bg-white">
                        <p class="heading__desc mb-30">Our goal is to deliver quality of care in a courteous, respectful,
                            and
                            compassionate
                            manner. We hope you will allow us to care for you and to be the first and best choice for
                            healthcare.
                        </p>
                        <p class="heading__desc mb-30">We will work with you to develop individualised care plans,
                            including
                            management of
                            chronic diseases. We are committed to being the region’s premier healthcare network providing
                            patient
                            centered care that inspires clinical and service excellence.</p>
                        <ul class="list-items list-unstyled">
                            <li>We conduct a range of tests to help us work out why you're not feeling well and determine
                                the
                                right
                                treatment for you.</li>
                            <li>Our expert doctors, nurses and allied health professionals manage patients with a broad
                                range of
                                medical issues.
                            </li>
                            <li>We offer a wide range of care and support to our patients, from diagnosis to treatment and
                                rehabilitation.
                            </li>
                        </ul>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

    <!-- ========================
              Services Layout 1
          =========================== -->
    {{-- <section class="services-layout1 services-carousel">
        <div class="bg-img"><img src="{{ asset('assets/frontend/assets/images/backgrounds/2.jpg') }}" alt="background">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h2 class="heading__subtitle">The Best Lab testing here</h2>
                        <h3 class="heading__title">Providing Medical Care For The Sickest In Our Community.</h3>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        @foreach ($labtests as $labtest)
                        <!-- service item #1 -->
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="product-item">
                                <div class="product__img">
                                    <a href="{{route('single.labtest',$labtest->id)}}">
                                        <img src="{{asset('uploads/labtest/'.$labtest->thumbnail)}}" alt="Product" loading="lazy">
                                    </a>
                                    <div class="product__action">
                                        <a href="{{route('single.labtest',$labtest->id)}}" class="btn btn__primary btn__rounded">
                                            <i class="icon-cart"></i> <span>View Details</span>
                                        </a>
                                    </div><!-- /.product-action -->
                                </div><!-- /.product-img -->
                                <div class="product__info">
                                    <h4 class="product__title"><a href="{{route('single.labtest',$labtest->id)}}">{{$labtest->name}}</a></h4>
                                    <span class="product__price">{{$labtest->price}} &#2547;</span>
                                </div><!-- /.product-content -->
                            </div><!-- /.product-item -->
                        </div><!-- /.col-lg-3 -->
                        @endforeach
                    </div>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Services Layout 1 --> --}}



    <!-- ======================
          Features Layout 2
          ========================= -->
    <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
        <div class="bg-img"><img src="{{asset('assets/frontend/assets/images/backgrounds/2.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-1">
                    <div class="heading__layout2 mb-50">
                        <h3 class="heading__title color-white">Medcity Has Touched The Lives Of Patients & Providing Care
                            for The
                            Sickest In Our Community.</h3>
                    </div>
                </div><!-- /col-lg-5 -->
            </div><!-- /.row -->
            <div class="row mb-100">
                <div class="col-sm-3 col-md-3 col-lg-1 offset-lg-5">
                    <div class="heading__icon">
                        <i class="icon-insurance"></i>
                    </div>
                </div><!-- /.col-lg-5 -->
                <div class="col-sm-9 col-md-9 col-lg-6">
                    <p class="heading__desc font-weight-bold color-white mb-30">Medcity has been present in Europe since
                        1990,
                        offering innovative
                        solutions, specializing in medical services for treatment of medical infrastructure. With over 100
                        professionals actively participates in numerous initiatives aimed at creating sustainable change for
                        patients!
                    </p>
                    <a href="#" class="btn btn__white btn__link">
                        <i class="icon-arrow-right icon-filled"></i>
                        <span>Our Core Values</span>
                    </a>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- Feature item #1 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/1.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-heart"></i>
                            </div>
                            <h4 class="feature__title">Medical Advices & Check Ups</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #2 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/2.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-doctor"></i>
                            </div>
                            <h4 class="feature__title">Trusted Medical Treatment </h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #3 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/3.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-ambulance"></i>
                            </div>
                            <h4 class="feature__title">Emergency Help Available 24/7</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #4 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/4.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-drugs"></i>
                            </div>
                            <h4 class="feature__title">Medical Research Professionals </h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #5 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/5.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-first-aid-kit"></i>
                            </div>
                            <h4 class="feature__title">Only Qualified Doctors</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #6 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/6.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-hospital"></i>
                            </div>
                            <h4 class="feature__title">Cutting Edge Facility All Patients</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #7 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/7.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-expenses"></i>
                            </div>
                            <h4 class="feature__title">Affordable Prices For All Patients</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #8 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('assets/frontend/assets/images/services/8.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-bandage"></i>
                            </div>
                            <h4 class="feature__title">Quality Care For Every Patient</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
                    <p class="font-weight-bold color-gray mb-0">We hope you will allow us to care for you and strive to be
                        the
                        first and best choice for healthcare.
                        <a href="#" class="color-secondary">
                            <span>Contact Us For More Information</span> <i class="icon-arrow-right"></i>
                        </a>
                    </p>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->




    <!-- ==========================
              contact layout 3
          =========================== -->
    <section class="contact-layout3 bg-overlay bg-overlay-primary-gradient pb-60">
        <div class="bg-img"><img src="{{asset('assets/frontend/assets/images/banners/3.jpg')}}" alt="banner"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="contact-panel mb-50">
                        <form class="" method="post" action="{{route('appiontmant')}}"
                            id="">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">Book An Appointment</h4>
                                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly
                                        reception staff
                                        with any general or medical enquiry. Our doctors will receive or return any urgent
                                        calls.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-widget form-group-icon"></i>
                                        <select class="form-control" name="hospital" id="hospital" required>
                                            <option value="">Choose Hospital</option>
                                            @foreach ($hospitals as $hospital)
                                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <select name="category" id="categories" class="form-control" required>
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Name" id="contact-name"
                                            name="name" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-email form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email"
                                            id="contact-email" name="email" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Phone"
                                            id="contact-Phone" name="phone" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control" id="contact-date" name="date"
                                            required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-date">
                                        <i class="icon-clock form-group-icon"></i>
                                        <input type="time" class="form-control" id="contact-time" name="time"
                                            required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-12">
                                    @auth
                                    <button type="submit"
                                        class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Book Appointment</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    @else
                                    <a href="{{route('login')}}"
                                        class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Book Appointment</span> <i class="icon-arrow-right"></i>
                                </a>
                                    @endauth
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div>
                </div><!-- /.col-lg-7 -->
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="heading heading-light mb-30">
                        <h3 class="heading__title mb-30">Helping Patients From Around the Globe!!</h3>
                        <p class="heading__desc">Our staff strives to make each interaction with patients clear, concise,
                            and
                            inviting. Support the important work of Medicsh Hospital by making a much-needed donation today.
                        </p>
                    </div>
                    <div class="text__block">
                        <p class="text__block-desc color-white font-weight-bold">We provide a comprehensive range of plans
                            for
                            families and individuals at every stage of life, with annual limits ranging from £1.5m to
                            unlimited.</p>
                        <div class="sinature color-white">
                            <span class="font-weight-bold">Martin Qube</span><span>, Medcity Manager</span>
                        </div>
                    </div><!-- /.text__block -->
                    <div class="slick-carousel clients-light mt-20"
                        data-slick='{"slidesToShow": 3, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/1.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/1.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/2.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/2.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/3.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/3.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/4.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/4.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/5.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/5.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/6.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/6.png')}}" alt="client">
                        </div><!-- /.client -->
                        <div class="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/7.png')}}" alt="client">
                            <img src="{{asset('assets/frontend/assets/images/clients/7.png')}}" alt="client">
                        </div><!-- /.client -->
                    </div><!-- /.carousel -->
                </div><!-- /.col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact layout 3 -->
@endsection
@section('footer_script')
    {{-- <script>
        $('#hospital').change(function(){
            var hospital_id = $('#hospital').val();
            var url = "{{ route('get.category') }}";

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


            $.ajax({
                type: "post",
                url: url,
                data: {'hospital_id':hospital_id},
                success: function (data) {
                    $('#categories').html(data);
                }
            });
        })
    </script> --}}
@endsection
