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
    <div class="container row mt-4 mb-4">
        @include('frontend.profile.sidebar')
        <div class='col-9' id='main'>
            <div class='card-deck'>
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <table class="table table-borderd table-striped ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>LabTest Name</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order_lists as $key=>$order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order?->labtest->name }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>&#2547; {{ $order->total }}
                                                <td>
                                                    @if ($order->status == 0)
                                                        <span class="">Pending</span>
                                                    @elseIf($order->status == 1)
                                                        <span class="">Confirmed</span>
                                                    @else
                                                        <span class="">Delevery</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($order->status == 0)
                                                        <button type="button" class="btns">
                                                            Report
                                                        </button>
                                                    @else
                                                        <a href="{{route('test.report.view', $order->id)}}" class="btns">View Report</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
