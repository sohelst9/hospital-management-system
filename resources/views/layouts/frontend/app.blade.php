<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Medcity - Medical Healthcare HTML5 Template">
    <link href="{{ asset('assets/frontend/assets/images/favicon/favicon.png') }}" rel="icon">
    <title>Medcity - Medical Healthcare</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/libraries.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .cart_btn
        {
            width: 3rem;
            height: 3rem;
            background: #21cdc0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .cart_btn:hover
        {
            background: #283b6a;
            color: #fff;
        }
    </style>
</head>

<body>



    <div class="wrapper">
        <div class="preloader">
            <div class="loading"><span></span><span></span><span></span><span></span></div>
        </div><!-- /.preloader -->

        <!-- =========================
        Header
    =========================== -->
        <header class="header header-layout1">
            <div class="header-topbar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                                    <li>
                                        <button class="miniPopup-emergency-trigger" type="button">24/7
                                            Emergency</button>
                                        <div id="miniPopup-emergency" class="miniPopup miniPopup-emergency text-center">
                                            <div class="emergency__icon">
                                                <i class="icon-call3"></i>
                                            </div>
                                            <a href="tel:+201061245741" class="phone__number">
                                                <i class="icon-phone"></i> <span>+2 01061245741</span>
                                            </a>
                                            <p>Please feel free to contact our friendly reception staff with any general
                                                or medical enquiry.
                                            </p>
                                            <a href="appointment.html" class="btn btn__secondary btn__link btn__block">
                                                <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                                            </a>
                                        </div><!-- /.miniPopup-emergency -->
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002)
                                            01061245741</a>
                                    </li>
                                    <!-- <li>
                    <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                  </li>
                  <li>
                    <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                  </li> -->
                                </ul><!-- /.contact__list -->
                                <div class="d-flex">
                                    <ul class="social-icons list-unstyled mb-0 mr-30">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul><!-- /.social-icons -->

                                </div>
                            </div>
                        </div><!-- /.col-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-top -->
            <nav class="navbar navbar-expand-lg sticky-navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('assets/frontend/assets/images/logo/logo-light.png') }}" class="logo-light"
                            alt="logo">
                        <img src="{{ asset('assets/frontend/assets/images/logo/logo-dark.png') }}" class="logo-dark"
                            alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNavigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav__item has-dropdown">
                                <a href="{{ route('index') }}"
                                    class=" nav__item-link active">Home</a>
                            </li><!-- /.nav-item -->
                            <li class="nav__item has-dropdown">
                                <a href="{{route('appointment_page')}}"  class=" nav__item-link">Appointment</a>

                            </li><!-- /.nav-item -->

                            <li class="nav__item has-dropdown">
                                <a href="#" data-toggle="dropdown"
                                    class="dropdown-toggle nav__item-link hospital">Hospitals</a>
                                <ul class="dropdown-menu">
                                    @php
                                        $hospitals = hospital();
                                    @endphp
                                    @foreach ($hospitals as $hospital)
                                        <li class="nav__item">
                                            <a href="{{ route('single.category', $hospital->id) }}"
                                                class="nav__item-link">{{ $hospital->name }}</a>
                                        </li><!-- /.nav-item -->
                                    @endforeach

                                </ul><!-- /.dropdown-menu -->
                            </li><!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="{{route('contact')}}" class="nav__item-link">Contacts</a>
                            </li><!-- /.nav-item -->
                        </ul><!-- /.navbar-nav -->
                        <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
                    </div><!-- /.navbar-collapse -->

                    @auth('web')
                        <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                            <a href="{{ route('frontend.dashboard') }}" class="btn btn__primary btn__rounded ml-30">
                                <i class="icon-calendar"></i>
                                <span>Profile</span>
                            </a>
                        </div>
                    @else
                        <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                            <a href="{{ route('login') }}" class="btn btn__primary btn__rounded ml-30">
                                <i class="icon-calendar"></i>
                                <span>Login</span>
                            </a>
                        </div>
                    @endauth

                    <div class="d-none d-xl-flex align-items-center position-relative">
                        <a href="{{route('cart.index')}}" class=" cart_btn  btn__rounded ml-30">
                            <i class="icon-cart"></i>
                        </a>
                    </div>

                </div><!-- /.container -->
            </nav><!-- /.navabr -->
        </header><!-- /.Header -->

        @yield('frontend_content')

        <!-- ========================
      Footer
    ========================== -->
        <footer class="footer">
            <div class="footer-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="footer-widget-about">
                                <img src="{{ asset('assets/frontend/assets/images/logo/logo-light.png') }}"
                                    alt="logo" class="mb-30">
                                <p class="color-gray">Our goal is to deliver quality of care in a courteous,
                                    respectful, and
                                    compassionate manner. We hope you will allow us to care for you and strive to be the
                                    first and best
                                    choice for your family healthcare.
                                </p>
                                <a href="{{route('appointment_page')}}" class="btn btn__primary btn__primary-style2 btn__link">
                                    <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                                </a>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-xl-2 -->
                        <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
                            <div class="footer-widget-nav">
                                <h6 class="footer-widget__title">Hospital</h6>
                                <nav>
                                    <ul class="list-unstyled">
                                        @php
                                            $hospitals = hospital();
                                        @endphp
                                        @foreach ($hospitals as $hospital)
                                            <li><a href="#">{{$hospital->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            <div class="footer-widget-nav">
                                <h6 class="footer-widget__title">Links</h6>
                                <nav>
                                    <ul class="list-unstyled">
                                        @php
                                        $hospitals = hospital();
                                    @endphp
                                    @foreach ($hospitals as $hospital)
                                        <li><a href="#">{{$hospital->name}}</a></li>
                                    @endforeach
                                    </ul>
                                </nav>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="footer-widget-contact">
                                <h6 class="footer-widget__title color-heading">Quick Contacts</h6>
                                <ul class="contact-list list-unstyled">
                                    <li>If you have any questions or need help, feel free to contact with our team.</li>
                                    <li>
                                        <a href="tel:01061245741" class="phone__number">
                                            <i class="icon-phone"></i> <span>01061245741</span>
                                        </a>
                                    </li>
                                    <li class="color-body">2307 Beverley Rd Brooklyn, New York 11226 United States.
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center">
                                    <a href="contact-us.html" class="btn btn__primary btn__link mr-30">
                                        <i class="icon-arrow-right"></i> <span>Get Directions</span>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul><!-- /.social-icons -->
                                </div>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-lg-2 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-primary -->
        </footer><!-- /.Footer -->
        <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
    </div><!-- /.wrapper -->

    <script src="{{ asset('assets/frontend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/main.js') }}"></script>
    @yield('footer_script')
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
