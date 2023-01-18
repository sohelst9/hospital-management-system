@extends('layouts.admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> LabTest List</h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">LabTest List</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Test Name</th>
                            <th>Total Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($test_reports as $key => $test)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $test?->labtest->name }}</td>
                                <td>{{ $test->total }}</td>
                                <td>{{ $test->quantity }}</td>
                                <td>
                                    @if ($test->status == 0)
                                        <a href="{{ route('admin.testreport.status', $test->id) }}">Pending</a>
                                    @else
                                        <span class="btn btn-sm btn-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('labtest.report.create', $test->id)}}" class="btn btn-primary btn-sm">Report</a>

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
