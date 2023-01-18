@extends('layouts.frontend.app')
@section('frontend_content')
    <style>
        .btns {
            padding: 8px;
            background-color: black;
            color: white;
            border-radius: 10px;
            font-size: 11px;
        }

        .btns:hover {
            color: red;
        }

        .checkout {
            padding: 12px 60px 12px 60px;
            background-color: black;
            color: white;
            border-radius: 10px;
            font-size: 20px;
        }

        .checkout:hover {
            color: white;
        }
    </style>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class='col-md-12' id='main'>
                <div class='card-deck'>
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-borderd table-striped ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Test Name</th>
                                                <th>Hospital Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>SubTotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @forelse ($carts as $key=>$cart)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $cart?->labtest->name }}</td>
                                                    <td>{{ $cart?->labtest->hospital->name }}</td>
                                                    <td>{{ $cart?->labtest->price }}</td>
                                                    @php
                                                        $subtotal = $cart?->labtest->price * $cart->quantity;
                                                    @endphp
                                                    <td>{{ $cart->quantity }}</td>
                                                    <td>{{ $subtotal }}</td>
                                                    <td><a href="" class="btns">Delete</a></td>
                                                </tr>
                                                @php
                                                    $total = $subtotal;
                                                @endphp
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <form action="{{route('checkout')}}" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 order-md-1">
                                                    <hr>
                                                    <h4 class="mb-3">Billing address</h4>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="firstName">First name</label>
                                                            <input type="text" class="form-control"
                                                                name="firstName"value="" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="lastName">Last name</label>
                                                            <input type="text" class="form-control" name="lastName" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="you@example.com">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" name="address"
                                                            placeholder="1234 Main St" required>
                                                    </div>


                                                    <hr class="mb-4">

                                                    <h4 class="mb-3">Payment</h4>

                                                    <div class="d-block my-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="1">
                                                            <label class="form-check-label" for="flexRadioDefault1" >
                                                              Cash On Delevery
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2" value="2">
                                                            <label class="form-check-label" for="flexRadioDefault2" >
                                                              SSL
                                                            </label>
                                                          </div>
                                                    </div>
                                                    <hr>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="submit" class="checkout">Order</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="total" value="{{ $total }}">
                                                            <h5>Total : <span>{{ $total }} </span>&#2547;</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
