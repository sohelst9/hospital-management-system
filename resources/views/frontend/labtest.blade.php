@extends('layouts.frontend.app')
@section('frontend_content')
    <section class="services-layout2 pt-130">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-60">
                        <h3 class="heading__title">{{ $category->name }} All Lab Test</h3>
                        <h2 class="heading__subtitle">Providing Medical Care For The Sickest In Our Community.</h2>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <section class="shop-grid">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                @forelse ($labtests as $labtest)
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="labtest_id" value="{{ $labtest->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="hospital_id" value="{{ $hospital?->hospital->id }}">
                                            <div class="product-item">
                                                <div class="product__img">
                                                    <a href="{{ route('single.labtest', $labtest->id) }}"><img
                                                            src="{{ asset('uploads/labtest/' . $labtest->thumbnail) }}"
                                                            alt="Product" loading="lazy"></a>
                                                    <div class="product__action">

                                                        @auth
                                                            <button type="submit" class="btn btn__primary btn__rounded">
                                                                <i class="icon-cart"></i> <span>Add To Cart</span>
                                                            </button>
                                                        @else
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn__secondary btn__rounded">add to cart</a>
                                                        @endauth
                                                    </div><!-- /.product-action -->
                                                </div><!-- /.product-img -->
                                                <div class="product__info">
                                                    <span class="text-info">Hospital :
                                                        {{ $labtest?->hospital->name }}</span>
                                                    <p class="text-primary">Location : {{ $labtest?->hospital->location }}
                                                    </p>
                                                    <h4 class="product__title"><a
                                                            href="{{ route('single.labtest', $labtest->id) }}">{{ $labtest->name }}</a>
                                                    </h4>
                                                    <span>Avilable Time : {{$labtest->time_avilable}}</span><br>
                                                    <span class="product__price">{{ $labtest->price }} &#2547;</span>
                                                </div><!-- /.product-content -->
                                            </div><!-- /.product-item -->
                                        </form>
                                    </div><!-- /.col-lg-3 -->
                                @empty
                                    <div class="not_avilable">
                                        <h4 class="">Service Not Avilable</h4>
                                    </div>
                                @endforelse


                            </div><!-- /.row -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
            </section><!-- /.shop -->
        </div><!-- /.container -->
    </section><!-- /.Services Layout 2 -->
@endsection
