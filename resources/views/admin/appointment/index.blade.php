@extends('layouts.admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Appointment List</h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Appointment List</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-primary">
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
                    <tbody class="table-border-bottom-0">
                        @foreach ($appointments as $key => $appointment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment?->category->name }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time_slot }}</td>
                                <td>
                                    @if ($appointment->status == 0)
                                        <a href="{{ route('admin.appointment.status', $appointment->id) }}">Pending</a>
                                    @else
                                        <span class="btn btn-sm btn-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        Report
                                    </button>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->
    </div>
@endsection
