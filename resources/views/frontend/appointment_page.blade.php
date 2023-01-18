@extends('layouts.frontend.app')
@section('frontend_content')
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
