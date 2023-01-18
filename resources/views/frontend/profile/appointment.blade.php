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
                                            <th>Action</th>
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
                                                <td>
                                                    @if ($appointment->status == 0)
                                                        <button type="button" class="btns">
                                                            Report
                                                        </button>
                                                    @else
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btns" data-toggle="modal"
                                                            data-target="#staticBackdrop">
                                                            View report
                                                        </button>
                                                    @endif


                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>


                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">View Report</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <table class="table table-borderd">
                                                   <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Comment</th>
                                                        <th>Report File</th>
                                                    </tr>
                                                   </thead>

                                                    <tbody>
                                                        {{-- <tr>
                                                            <td>{{$appointment->appointmentReport?->title}}</td>
                                                            <td>{{$appointment->appointmentReport?->comment}}</td>
                                                            <td>
                                                                @if ($appointment->appointmentReport)
                                                                    <img src="{{asset('uploads/appointment_report/'.$appointment->appointmentReport->report_file)}}" alt="">
                                                                @endif
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                               </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btns"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
