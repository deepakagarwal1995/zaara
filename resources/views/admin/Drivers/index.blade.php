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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>License</th>
                                    <th>Insurance</th>

                                    <th>Vehicle Type</th>
                                    <th>Docs</th>
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

                                        <td>{{ $row->name }}<br>
                                             {{ $row->phone }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->city }}</td>
                                        <td>License: {{ $row->license }}<br>
                                            Registration: {{ $row->registration }}</td>
                                            <td>Manufacture: {{ $row->year }}<br>
                                                Insurance: {{ $row->lisence_exp }}</td>
                                                <td>{{ $row->cab->name }} ({{ $row->cab->title }})</td>
                                        <td style="min-width: 151px;
    text-decoration: underline;">@if($row->license_img!='')<a target="_blank" href="{{ Storage::url('driver/' . $row->license_img) }}">Driver licence</a>@endif<br>
                                            @if($row->insuranse_img!='')<a target="_blank" href="{{ Storage::url('driver/' . $row->insuranse_img) }}">Insurance Paper</a>@endif<br>
                                            @if($row->registration_img!='')<a target="_blank" href="{{ Storage::url('driver/' . $row->registration_img) }}">RC Image</a>@endif
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
                                            <div class="d-flex">


                                            @if ($row->status == 0)
                                            <a href="{{ route('driver.status', $row->id,$row->status) }}"
                                                class="btn btn-success me-1">Approve</a>
                                            @endif





                                                <form action="{{ route('driver.destroy', $row->id) }}" method="post">
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
