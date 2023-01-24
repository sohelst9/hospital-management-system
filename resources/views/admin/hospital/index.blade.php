@extends('layouts.admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Hospital List</h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Hospital List</h5>
                <a href="{{ route('hospital.create') }}" class="btn btn-sm btn-primary">
                    <box-icon name='left-arrow-alt'></box-icon>Add New
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($hospitals as $hospital)
                            <tr>
                                <td>{{ ($hospitals->currentpage() - 1) * $hospitals->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->location }}</td>
                                <td><img src="{{ asset('uploads/hospital/thumbnail/' . $hospital->thumbnail) }}"
                                        width="100px" class="rounded-circle"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('hospital.edit', $hospital->id) }}"
                                            class="btn btn-sm btn-primary me-3">Edit</a>
                                        <form action="{{ route('hospital.destroy', $hospital->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $hospitals->links() }}
                </table>
            </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->
    </div>
@endsection
