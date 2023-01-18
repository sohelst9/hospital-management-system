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
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.appointment.report.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Report Review</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Title</label>
                                            <input type="text" id="nameWithTitle" name="title"
                                                class="form-control" placeholder="Enter Name"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailWithTitle"
                                                class="form-label">Comment</label>
                                            <textarea name="comment" id="emailWithTitle" class="form-control" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Report
                                                File</label>
                                            <input type="file" name="report_file"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->
    </div>
@endsection
