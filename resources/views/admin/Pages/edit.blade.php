@extends('layouts.app', ['title' => $title])
@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-title-box">

        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">{{ $title }} </h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>



                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>



    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body pt-2">

                    <form action="{{ route('pages.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" id="title" class="form-control" value="{{ $item->title }}"
                                        name="title" required />
                                    @error('title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" class="form-control" value="{{ $item->slug }}" id="slug"
                                        name="slug" required />
                                    @error('slug')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control" name="category" required>
                                        <option value="Airport_cab_service"
                                            @if ($item->category == 'Airport_cab_service') selected @endif>Airport cab service</option>
                                        <option value="Luxury_Car_Rental" @if ($item->category == 'Luxury_Car_Rental') selected @endif>
                                            Luxury Car Rental</option>
                                        <option value="Local_sightseeing_package"
                                            @if ($item->category == 'Local_sightseeing_package') selected @endif>Local sightseeing package
                                        </option>
                                        <option value="Outstation_Cab_Booking"
                                            @if ($item->category == 'Outstation_Cab_Booking') selected @endif>Outstation Cab Booking
                                        </option>

                                    </select>
                                    @error('category')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Show on Home Page</label>
                                    <select class="form-control" name="is_home" required>
                                        <option value="1" @if ($item->is_home == 1) selected @endif>Yes
                                        </option>
                                        <option value="0" @if ($item->is_home == 0) selected @endif>No</option>

                                    </select>
                                    @error('is_home')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Description</label>
                                    <textarea class="form-control" name="sdescr" required>{{ $item->sdescr }}</textarea>
                                    @error('sdescr')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" name="descr" required id="descr">{!! $item->descr !!}</textarea>
                                    @error('descr')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if ($item->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if ($item->status == 0) selected @endif>Unactive
                                        </option>


                                    </select>
                                    @error('status')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City Name</label>
                                    <select class="form-control" name="cid" required>
                                        @foreach($items as $city)
                                            <option @if ($city->name == $item->cid) selected @endif>{{ $city->name }}</option>
                                        @endforeach


                                    </select>
                                    @error('cid')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">External Title</label>
                                    <input type="text" class="form-control" value="{{ $item->external_title }}" id="external_title"
                                        name="external_title" required />
                                    @error('external_title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            @php
                                $selectedOptions = explode(',', $item->external_links);
                            @endphp
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">External Links</label>
                                    <select class="form-control select2" name="external_links[]" id="example" multiple="multiple">
                                        @foreach($pages as $city)
                                            <option value="{{$city->id }}" {{ in_array($city->id, $selectedOptions) ? 'selected' : '' }}>{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('external_links')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!-- end col -->



                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .cke_notification_warning {
            display: none;
        }

        #descr {
            min-height: 404px;
        }
    </style>
    <script>
        CKEDITOR.replace('descr');

        $(document).ready(function() {
            $('#title').on('change', function() {
                var title = $(this).val();

                // Convert the title to slug
                var slug = title
                    .toLowerCase() // Convert to lowercase
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Replace multiple hyphens with a single hyphen

                // Set the slug input value
                $('#slug').val(slug);
            });
        });
    </script>
 <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select options",
            allowClear: true
        });
    });
</script>
@endsection
