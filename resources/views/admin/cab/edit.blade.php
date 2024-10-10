@extends('layouts.app', ['title' => $title])

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

                    <form action="{{ route('cab.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" value="{{ $item->name }}" name="name"
                                        required />
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cars Name</label>
                                    <input type="text" class="form-control" value="{{ $item->title }}" name="title"
                                        required />
                                    @error('title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">AC Cab</label>
                                    <select class="form-control" name="ac_cab" required>
                                        <option value="1" @if ($item->ac_cab == 1) selected @endif>Yes
                                        </option>
                                        <option value="0" @if ($item->ac_cab == 0) selected @endif>No</option>

                                    </select>
                                    @error('ac_cab')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cab type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="1" @if ($item->type == 1) selected @endif>Regular
                                        </option>
                                        <option value="2" @if ($item->type == 2) selected @endif>Luxury
                                        </option>

                                    </select>
                                    @error('type')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Capacity</label>
                                    <input type="text" class="form-control" value="{{ $item->capacity }}"
                                        name="capacity" required />
                                    @error('capacity')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cab Image</label>
                                    <input type="file" accept="image/*" class="form-control" name="photo" />
                                    @error('photo')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Per KM Charges</label>
                                    <input type="number" class="form-control" value="{{ $item->km_charges }}"
                                        name="km_charges" required />
                                    @error('km_charges')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Driver allowance Per Night</label>
                                    <input type="number" class="form-control" value="{{ $item->allowance }}"
                                        name="allowance" required />
                                    @error('allowance')
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
                                    <label for="exampleInputEmail1">Display Order</label>
                                    <input type="number" class="form-control" value="{{ $item->orders }}"  name="orders" required />
                                    @error('orders')
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
