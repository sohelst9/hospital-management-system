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
                            <th>Patient</th>
                            <th>Hospital</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Test</th>
                            <th>Email</th>
                            <th> Date</th>
                            <th> Time</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($test_reports as $key => $test)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $test->fname }} {{ $test->lname }}</td>
                                <td>{{ $test?->hospital->name }}</td>
                                <td>{{ $test?->hospital->location }}</td>
                                <td>{{ $test?->labtest->category->name }}</td>
                                <td>{{ $test?->labtest->name }}</td>
                                <td>{{ $test->email }}</td>
                                <td>{{ $test->date }}</td>
                                <td>{{ $test?->labtestTime?->time }}</td>
                                <td>{{ $test->total }}</td>
                                <td>{{ $test->quantity }}</td>
                                <td>
                                    <div class="btn-group">
                                        @if ($test->status == 0)
                                            <a type="button" class="btn btn-warning btn-sm dropdown-toggle text-white"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Pending
                                            </a>
                                        @endif

                                        @if ($test->status == 1)
                                            <a type="button" class="btn btn-primary btn-sm dropdown-toggle text-white"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Accept
                                            </a>
                                        @endif

                                        @if ($test->status == 2)
                                            <a type="button" class="btn btn-danger btn-sm dropdown-toggle text-white"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Canceled
                                            </a>
                                        @endif

                                        <ul class="dropdown-menu" style="">
                                            @if ($test->status == 0)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 2]) }}">Canceled</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 1]) }}">Accept</a>
                                                </li>
                                            @endif

                                            @if ($test->status == 1)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 2]) }}">Canceled</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 0]) }}">Pending</a>
                                                </li>
                                            @endif

                                            @if ($test->status == 2)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 0]) }}">Pending</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.testreport.status', ['test_id' => $test->id, 'status' => 1]) }}">Accept</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('labtest.report.create', $test->id) }}"
                                        class="btn btn-primary btn-sm">Report</a> --}}

                                    <div class="btn-group" id="dropdown-icon-demo">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bx bx-menu"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="">
                                            <li>
                                                <a href="{{ route('labtest.report.create', $test->id) }}"
                                                    class="dropdown-item d-flex align-items-center">Report</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('labtest.report.time.add', $test->id) }}"
                                                    class="dropdown-item d-flex align-items-center">Add Time</a>
                                            </li>
                                        </ul>
                                    </div>

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
@section('admin_script')
    <script>
        // dropdown action
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });

        var inputEle = document.getElementById('timeInput');


     
    </script>
@endsection
