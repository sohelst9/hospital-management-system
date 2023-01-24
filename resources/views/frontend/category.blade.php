@extends('layouts.frontend.app')
@section('frontend_content')
    <section class="page-title">
        <div class="bg-img"><img src="{{ asset('assets/frontend/assets/images/page-titles/4.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-5">
                    <h1 class="pagetitle__heading">Providing Care for The Sickest In Community.</h1>
                    <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative
                        solutions, specializing in medical services for treatment of medical infrastructure.
                    </p>
                    <ul class="features-list list-unstyled mb-0 d-flex flex-wrap justify-content-between">
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
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
        Services Layout 2
    =========================== -->
    <section class="services-layout2 pt-130">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h3 style="margin:0">{{$hospital->name}} All Services</h3>
                        <span class="text-success">Location : {{$hospital->location}}</span>
                        <h2 class="heading__subtitle mt-3">Providing Medical Care For The Sickest In Our Community.</h2>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                @forelse ($categories as $category)
                <!-- service item #1 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__img">
                            <a href="{{route('labtest',$category->id)}}">
                                <img src="{{asset('uploads/category/'.$category->thumbnail)}}" alt="img" loading="lazy">
                            </a>
                        </div><!-- /.service__img -->
                        <div class="service__content">
                            <a href="{{route('labtest',$category->id)}}"><h4 class="service__title">{{$category->name}}</h4></a>
                            <p class="service__desc">
                                {{ strip_tags(Str::limit($category->description, 120)) }}
                            </p>
                            <a href="{{route('labtest',$category->id)}}" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>View Lab Tests</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.service__content -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
                @empty
                <div class="not_avilable">
                    <h4 class="">Service Not Avilable</h4>
                </div>
                @endforelse



            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Services Layout 2 -->
@endsection
