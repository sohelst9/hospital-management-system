@extends('layouts.frontend.app')
@section('frontend_content')
    <!-- ========================
        Services Layout 2
    =========================== -->
    <section class="services-layout2 pt-130">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h3 class="heading__title">Hospital List </h3>
                        <h2 class="heading__subtitle">Providing Medical Care For The Sickest In Our Community.</h2>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                @forelse ($hospitals as $hospital)
                <!-- service item #1 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="service-item">
                        <div class="service__img">
                            <a href="{{ route('single.category',$hospital->id) }}">
                                <img src="{{asset('uploads/hospital/thumbnail/'.$hospital->thumbnail)}}" alt="img" loading="lazy">
                            </a>
                        </div><!-- /.service__img -->
                        <div class="service__content">
                            <a href="{{ route('single.category',$hospital->id) }}"><h4 class="service__title">{{$hospital->name}}</h4></a>
                            <span class="mb-2 text-success">Location : {{$hospital->location}}</span>
                            <p class="service__desc">
                                {{ strip_tags(Str::limit($hospital->description, 120)) }}
                            </p>
                            <a href="{{ route('single.category',$hospital->id) }}" class="btn btn__secondary btn__outlined btn__rounded">
                                <span>View More</span>
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
