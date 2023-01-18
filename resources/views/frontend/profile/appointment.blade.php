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
                                            <th>User Name</th>
                                            <th>Category Name</th>
                                            <th>phone</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($appointments as $key=>$appointment)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment?->category->name }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time_slot }}</td>
                                                <td>
                                                    @if ($appointment->status == 0)
                                                        <span class="text-danger">Pending</span>
                                                    @else
                                                        <span class="">Success</span>
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
