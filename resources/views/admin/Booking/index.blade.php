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
                                    <th>Booked By</th>
                                    <th>Trip Type</th>
                                    <th>Cab Type</th>
                                    <th>Trip Details</th>
                                    <th>Trip Dates</th>
                                    <th>Pickup Details</th>
                                    <th style="min-width: 120px;">Payment Details</th>
                                    <th>Booked on</th>
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
                                        {{ $row->phone }}<br>
                                        {{ $row->email }}</td>
                                        <td>{{ str_replace('_', ' ', $row->type) }}<br>
                                    @if($row->type=='Local_Trip')
                                       @if ($row->package == 8)
                                       <b>Package</b> : 8 Hours 80 Km
                                            @endif
                                            @if ($row->package == 12)
                                            <b>Package</b> : 12 Hours 120 Km
                                            @endif
                                    @endif
                                    </td>
                                        <td>{{ $row->cab }}(<small>{{ $row->cabname }}</small>)</td>
                                        <td><b>From :</b>{{ $row->plocation }}<br>
                                        @if($row->dlocation!='')<b>To : </b>{{ $row->dlocation }}<br>@endif
                                    </td>
<td>@if($row->pdate!='')<b>Start On :</b>{{ $row->pdate }}@endif
@if($row->ddate!='')<br><b>End On :</b>{{ $row->ddate }}@endif</td>
                                         
                                        <td><b>Pickup At</b>: {{ $row->ptime }}<br>
                                        <b>Address</b>: {{ $row->address }}</td>
                                        <td><b>Total Fare</b>: {{ $row->price }} Rs<br>
                                        <b>Paid</b>: {{ $row->payment }} Rs<br>
                                        {{ $row->pay_type }} %</td>
                                        <td>{{ date('d-m-Y',strtotime($row->ptime)) }}</td>
                                         
                                        <td>
                                            @if ($row->pay_status == 'paid')
                                                <span class="badge bg-success">Successful</span>
                                            @endif

                                            @if ($row->pay_status == 'unpaid')
                                                <span class="badge bg-danger">Failed</span>
                                            @endif

                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                

                                                <form action="{{ route('booking.destroy', $row->id) }}" method="post">
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
