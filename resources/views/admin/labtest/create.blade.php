@extends('layouts.admin.app');
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Add Lab Test</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add Lab Test</h5>
                        <a href="{{ route('labtest.index') }}" class="btn btn-sm btn-primary">
                            <box-icon name='left-arrow-alt'></box-icon>Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('labtest.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name <span
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
                                <label class="col-sm-2 col-form-label" for="name">Hospital <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="hospital" id="hospital" class="form-control">
                                        @if (Auth::guard('admin')->user()->Is_admin == 1)
                                            <option value="">-select-</option>
                                            @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">{{ $hospital->name }} ({{$hospital->location}})</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $hospitals->id }}">{{ $hospitals->name }} ({{$hospitals->location}})</option>
                                        @endif
                                    </select>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">category <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if (Auth::guard('admin')->user()->Is_admin == 1)
                                        <select name="category" id="category" class="form-control">
                                            <option value="">--select--</option>

                                        </select>
                                    @else
                                        <select name="category" id="category" class="form-control">
                                            <option value="">--select--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="time_avilable">time availability <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="time_avilable" name="time_avilable" />
                                    @error('time_avilable')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Price <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price" name="price" />
                                    @error('price')
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

        //hospital based category
        $('#hospital').change(function() {
            var hospital = $('#hospital').val();
            var url = "{{ route('hospital.based.category') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    'hospital': hospital
                },
                success: function(data) {
                    $('#category').html(data);

                }
            });
        });
    </script>
@endsection
