@extends('layouts.admin.app');
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Add Time</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add Time</h5>
                        <a href="{{ route('admin.labtest.report') }}" class="btn btn-sm btn-primary">
                            <box-icon name='left-arrow-alt'></box-icon>Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.test.report.time.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="labtest_order_id" value="{{ $id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="time">Time <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="time"
                                        id="time" required min="08:00" max="9:00" step="00:15" />

                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
