@extends('layouts.admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Labtest List</h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Labtest List</h5>
                <a href="{{ route('labtest.create') }}" class="btn btn-sm btn-primary">
                    <box-icon name='left-arrow-alt'></box-icon>Add New
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($labtests as $labtest)
                            <tr>
                                <td>{{ ($labtests->currentpage() - 1) * $labtests->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $labtest->name }}</td>
                                <td>{{ $labtest?->category->name }}</td>
                                <td>{{ $labtest->price ?? '0' }}</td>
                                <td><img src="{{ asset('uploads/labtest/' . $labtest->thumbnail) }}"
                                        width="100px" class="rounded-circle"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('labtest.edit', $labtest->id) }}"
                                            class="btn btn-sm btn-primary me-3">Edit</a>
                                        <form action="{{ route('labtest.destroy', $labtest->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $labtests->links() }}
                </table>
            </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->
    </div>
@endsection
