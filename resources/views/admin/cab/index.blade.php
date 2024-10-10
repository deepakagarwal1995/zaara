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


        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">

                    @include('admin.inc.search')
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Cars</th>
                                    <th>Charges(Per Km)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $currentPage = $items->currentPage() - 1;
                                    $currentPage = $currentPage * $items->perPage();

                                @endphp

                                @foreach ($items as $row)
                                    <tr>
                                        <td scope="row">{{ $loop->index + $currentPage + 1 }}</td>
                                        <td><img class="img-fluid img-thumbnail"
                                                src="{{ Storage::url('images/' . $row->photo) }}" alt="Uploaded Image"
                                                style="max-width: 100px;"></td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->km_charges }}</td>
                                        <td>
                                            @if ($row->type == 1)
                                                Regular
                                            @endif
                                            @if ($row->type == 2)
                                                Luxury
                                            @endif

                                        </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @endif

                                            @if ($row->status == 0)
                                                <span class="badge bg-danger">Unactive</span>
                                            @endif

                                        </td>

                                        <td>
                                            <div class="d-flex"> <a href="{{ route('cab.edit', $row->id) }}"
                                                    class="btn btn-icon btn-warning me-1"><i class="ti ti-edit"></i></a>

                                                <form action="{{ route('cab.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are You Sure You Want to Delete !!')"
                                                        class="btn btn-icon btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @include('admin.inc.pagination')
                </div>
                <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
