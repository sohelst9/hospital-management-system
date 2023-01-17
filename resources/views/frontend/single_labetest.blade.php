@extends('layouts.frontend.app')
@section('frontend_content')
    <section class="shop pb-40 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
                        <h3 class="alert__title my-1">{{ $labtest->name }}</h3>
                        {{-- <a href="cart.html" class="btn btn__secondary btn__rounded">View Cart</a> --}}
                    </div><!-- /.alert-panel-->
                    <div class="row product-item-single">
                        <div class="col-sm-6">
                            <div class="single_product product__img">
                                <img src="{{ asset('uploads/labtest/' . $labtest->thumbnail) }}" class="zoomin" alt="product"
                                    loading="lazy">
                            </div><!-- /.product-img -->
                        </div>
                        <div class="col-sm-6">
                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="labtest_id" value="{{$labtest->id}}">
                                <input type="hidden" name="quantity" value="1">
                                <h1 class="product__title">{{ $labtest->name }}</h1>

                                <span class="product__price mb-20">{{ $labtest->price }} &#2547;</span>
                                <div class="product__desc">
                                    <p>
                                        {{ strip_tags(Str::limit($labtest->description, 200)) }}
                                    </p>
                                </div><!-- /.product-desc -->
                                <div class="product__quantity d-flex mb-30">
                                    @auth
                                        <button type="submit" class="btn btn__secondary btn__rounded">add to cart</button>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn__secondary btn__rounded">add to cart</a>
                                    @endauth
                                </div><!-- /.product-quantity -->
                                <div class="product__meta-details">
                                    <ul class="list-unstyled mb-30">
                                        <li><span>Hospital :</span> <span>{{ $hospital?->hospital->name }}</span></li>
                                        <li><span>Category :</span> <span>{{ $category?->category->name }}</span></li>
                                    </ul>
                                </div><!-- /.product__meta-details -->
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </form>
                        </div>
                    </div><!-- /.row -->
                    <div class="product__details mt-100">
                        <nav class="nav nav-tabs">
                            <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                        </nav>
                        <div class="tab-content mb-50" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="Description">
                                <p>{!! $labtest->description !!}</p>
                            </div><!-- /.desc-tab -->
                        </div>
                    </div><!-- /.product-tabs -->
                    <h6 class="related__products-title text-center-xs mb-25">Related Lab test</h6>
                    <div class="row">
                        @forelse ($related_tests as $related_test)
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="product-item">
                                    <div class="product__img">
                                        <a href="{{ route('single.labtest', $related_test->id) }}"><img
                                                src="{{ asset('uploads/labtest/' . $related_test->thumbnail) }}"
                                                alt="Product" loading="lazy"></a>
                                        <div class="product__action">
                                            <a href="#" class="btn btn__primary btn__rounded">
                                                <i class="icon-cart"></i> <span>Add To Cart</span>
                                            </a>
                                        </div><!-- /.product-action -->
                                    </div><!-- /.product-img -->
                                    <div class="product__info">
                                        <h4 class="product__title"><a
                                                href="{{ route('single.labtest', $related_test->id) }}">{{ $related_test->name }}</a>
                                        </h4>
                                        <span class="product__price">{{ $related_test->price }} &#2547;</span>
                                    </div><!-- /.product-content -->
                                </div><!-- /.product-item -->
                            </div><!-- /.col-lg-3 -->
                        @empty
                            <div class="not_avilable">
                                <h4 class="">Related Data Empty ! </h4>
                            </div>
                        @endforelse
                    </div><!-- /.row -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.shop single -->
@endsection
