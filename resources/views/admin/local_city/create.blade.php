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

                    <form action="{{ route('local_city.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        required />
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Unactive</option>
                                    </select>
                                    @error('status')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Cab Category</th>
                                            <th>8 Hr Charges</th>
                                            <th>12 Hr Charges</th>
                                            <th>Extra Hr Charges</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $row)
                                            <tr>
                                                <td scope="row"><input class="form-control" type="text"
                                                        value="{{ $row->name }} ({{ $row->title }})" readonly>
                                                    <input type="hidden" value="{{ $row->id }}" name="cab_id[]">
                                                </td>
                                                <td><input type="number" class="form-control" name="eight_hr[]"></td>
                                                <td><input type="number" class="form-control" name="twelve_hr[]"></td>
                                                <td><input type="number" class="form-control" name="extra_hr[]"></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>



                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
