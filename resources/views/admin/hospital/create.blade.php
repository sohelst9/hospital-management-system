@extends('layouts.admin.app');
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Add Hospital</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add Hospital</h5>
                        <a href="{{ route('hospital.index') }}" class="btn btn-sm btn-primary">
                            <box-icon name='left-arrow-alt'></box-icon>Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('hospital.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name"> Hospital Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Hospital Name" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Hospital email" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="phone">Contact Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Hospital phone" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="subtitle">Sub-Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        placeholder="Enter Hospital subtitle" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="location">Location <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter Hospital location" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="subtitle">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="thumbnail">Thumbnail <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" />
                                    @error('thumbnail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="username">Username <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter Hospital username" />
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="password">Password <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Hospital password" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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

@section('admin_script')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
