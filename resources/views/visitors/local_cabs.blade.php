@extends('visitors.layout')

@section('content')
    <style>
        .homebanner {
            background: #e1e1e1;
            padding: 2px 0px 12px;
        }
    </style>
    <div class="homebanner btHome">
        <div class="container">
            <div class="hMsearchbx clearfix PR" title="Cab booking form">




                <div class="tab-pane select_detail in fade active" id="localtrip">



                    <form method="post" action="{{ route('local_cabs') }}" class="form-horizontal">
                        @csrf
                        <div class="inpbx">
                            <label>From</label>



                            <input name="start_from" autocomplete="off" id="city-autocomplete"
                                placeholder="Enter Pick Up City" required value="{{ $request->start_from }}" />



                        </div>



                        <div class="inpbx">



                            <label for="lorndtrip">Package</label>



                            <select name="package" required id="lorndtrip">



                                <option value='8' @if ($request->package == 8) selected @endif>8 Hours 80 Km
                                </option>



                                <option value='12' @if ($request->package == 12) selected @endif>812 Hours 120 Km
                                </option>



                            </select>



                        </div>



                        <div class="inpbx">



                            <label>Departure</label>



                            <input type="text" name="start_on" id="lodate" readonly aria-invalid="false" required
                                autocomplete="off" placeholder="Journey Date" value="{{ $request->start_on }}">



                        </div>



                        <div class="inpbx timebx">



                            <label for="lopickuptime">Pickup Time</label>



                            <select class="selectbox" id="lopickuptime" name="start_time" required="required">
                                <option value="{{ $request->start_time }}">{{ $request->start_time }}</option>

                                <option>12:00 AM</option>
                                <option>01:00 AM</option>
                                <option>02:00 AM</option>
                                <option>03:00 AM</option>
                                <option>04:00 AM</option>
                                <option>05:00 AM</option>
                                <option>06:00 AM</option>
                                <option>07:00 AM</option>
                                <option>08:00 AM</option>
                                <option>09:00 AM</option>
                                <option>10:00 AM</option>
                                <option>11:00 AM</option>
                                <option>12:00 PM</option>
                                <option>01:00 PM</option>
                                <option>02:00 PM</option>
                                <option>03:00 PM</option>
                                <option>04:00 PM</option>
                                <option>05:00 PM</option>
                                <option>06:00 PM</option>
                                <option>07:00 PM</option>
                                <option>08:00 PM</option>
                                <option>09:00 PM</option>
                                <option>10:00 PM</option>
                                <option>11:00 PM</option>
                            </select>



                            </select>



                        </div>



                        <button class="btn_big" type="submit">Modify</button>



                    </form>



                </div>







            </div>



            <!-- booking form end here -->
        </div>
    </div>
    </div>
    <!-- page banner and form start here -->
    <!-- service section Start here -->
    <section>
        <div class="container">
            <div class="choose_cabtab">
                <ul class="nav-tabs">
                    <li class="active" onclick="changeTab('.tab-index-1','.tab-index-2')"><a href="javascript:void(0)">
                            Regular Cab </a></li>
                    <li onclick="changeTab('.tab-index-2','.tab-index-1')"><a href="javascript:void(0)"> Luxury Cars </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
                <div class="col-md-8 col-xs-12">

                    @foreach ($regular_data as $row)
                        @php
                            if ($request->package == 8) {
                                $price = $row->eight_hr;
                            } else {
                                $price = $row->twelve_hr;
                            }
                        @endphp
                        <div class="carBoption tab-index-1 ">
                            <div class="cabListFdtl">

                                <figure><img src="{{ Storage::url('images/' . $row->cab->photo) }}" alt="">
                                </figure>


                                <div class="car_detail">

                                    <h4>{{ $row->cab->name }} - <span>{{ $row->cab->title }}</span></h4>

                                    <p><strong>
                                            @if ($row->cab->ac_cab == 1)
                                                AC Cab
                                            @else
                                                Non AC Cab
                                            @endif
                                        </strong> | <svg aria-hidden="true" width="10" focusable="false"
                                            data-prefix="fas" data-icon="user" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                                            </path>
                                        </svg> {{ $row->cab->capacity }}</p>

                                    <!--<p class="hidden-xs">Billing from Pick-up to Pick-up</p>-->

                                    <div><span class="checkfairpp">View Fare Detail <span class="arrow_down"></span></span>
                                    </div>

                                </div>
                                <div class="tpbook">
                                    <p>&#8377; {{ $price }}
                                    </p>
                                    <form action="{{ route('checkout') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plocation" value="{{ $request->start_from }}">
                                        <input type="hidden" name="package" value="{{ $request->package }}">
                                        <input type="hidden" name="pdate" value="{{ $request->start_on }}">
                                        <input type="hidden" name="ptime" value="{{ $request->start_time }}">
                                        <input type="hidden" name="type" value="Local_Trip">
                                        <input type="hidden" name="cab_id" value="{{ $row->cab->id }}">
                                        <input type="hidden" name="price" value="{{ $price }}">
                                        <button type="submit" class="bookcb">Book</button>
                                    </form>

                                </div>

                            </div>


                            <div class="faredetail clearfix">


                                <div class="col-md-6 col-xs-12">

                                    <ul>
                                        <li class="hidden-lg">Billing from Pick-up to Pick-up</li>
                                        <li><strong>Inclusive:</strong> Base Fare, Fuel Charges, Driver Allowance.</li>
                                        <li>Driver Allowance after 12am Midnight &#8377; 200 </li>
                                        <li><strong>Exclusion:</strong> Tolls Tax, Inter State Tax & Parking Charges are
                                            payable
                                            by guest as per actual ( if applicable)</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <h5>Fare Breakup</h5>
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tr>
                                            <td>Base fair for @if ($request->package == 8)
                                                    8 Hours 80 Km
                                                @else
                                                    12 Hours 120 Km
                                                @endif
                                            </td>
                                            <td>&#8377; {{ $price }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Extra Km after Base km</td>
                                            <td>&#8377; {{ $row->cab->km_charges }}</td>
                                        </tr>
                                        <tr>
                                            <td>Extra hour after base hour</td>
                                            <td>&#8377; {{ $row->extra_hr }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Fare</td>
                                            <td>&#8377;{{ $price }}
                                            </td>

                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </div>
                    @endforeach


                    @foreach ($luxary_data as $row)
                        @php
                            if ($request->package == 8) {
                                $price = $row->eight_hr;
                            } else {
                                $price = $row->twelve_hr;
                            }
                        @endphp
                        <div class="carBoption tab-index-2 hide-search-tab">
                            <div class="cabListFdtl">

                                <figure><img src="{{ Storage::url('images/' . $row->cab->photo) }}" alt="">
                                </figure>


                                <div class="car_detail">

                                    <h4>{{ $row->cab->name }} - <span>{{ $row->cab->title }}</span></h4>

                                    <p><strong>
                                            @if ($row->cab->ac_cab == 1)
                                                AC Cab
                                            @else
                                                Non AC Cab
                                            @endif
                                        </strong> | <svg aria-hidden="true" width="10" focusable="false"
                                            data-prefix="fas" data-icon="user" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                                            </path>
                                        </svg> {{ $row->cab->capacity }}</p>

                                    <!--<p class="hidden-xs">Billing from Pick-up to Pick-up</p>-->

                                    <div><span class="checkfairpp">View Fare Detail <span
                                                class="arrow_down"></span></span>
                                    </div>

                                </div>
                                <div class="tpbook">
                                    <p>&#8377; {{ $price }}
                                    </p>
                                    <form action="{{ route('checkout') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plocation" value="{{ $request->start_from }}">
                                        <input type="hidden" name="package" value="{{ $request->package }}">
                                        <input type="hidden" name="pdate" value="{{ $request->start_on }}">
                                        <input type="hidden" name="ptime" value="{{ $request->start_time }}">
                                        <input type="hidden" name="type" value="Local_Trip">
                                        <input type="hidden" name="cab_id" value="{{ $row->cab->id }}">
                                        <input type="hidden" name="price" value="{{ $price }}">
                                        <button type="submit" class="bookcb">Book</button>
                                    </form>
                                </div>

                            </div>


                            <div class="faredetail clearfix">


                                <div class="col-md-6 col-xs-12">

                                    <ul>
                                        <li class="hidden-lg">Billing from Pick-up to Pick-up</li>
                                        <li><strong>Inclusive:</strong> Base Fare, Fuel Charges, Driver Allowance.</li>
                                        <li>Driver Allowance after 12am Midnight &#8377; 200 </li>
                                        <li><strong>Exclusion:</strong> Tolls Tax, Inter State Tax & Parking Charges are
                                            payable
                                            by guest as per actual ( if applicable)</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <h5>Fare Breakup</h5>
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tr>
                                            <td>Base fair for @if ($request->package == 8)
                                                    8 Hours 80 Km
                                                @else
                                                    12 Hours 120 Km
                                                @endif
                                            </td>
                                            <td>&#8377; {{ $price }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Extra Km after Base km</td>
                                            <td>&#8377; {{ $row->cab->km_charges }}</td>
                                        </tr>
                                        <tr>
                                            <td>Extra hour after base hour</td>
                                            <td>&#8377; {{ $row->extra_hr }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Fare</td>
                                            <td>&#8377; {{ $price }}
                                            </td>

                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-md-4 hide_1024">
                    <div class="sidebenefit">
                        <ul>
                            <li>
                                <svg aria-hidden="true" width="28" focusable="false" data-prefix="fas"
                                    data-icon="user-friends" class="svg-inline--fa fa-user-friends fa-w-20"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z">
                                    </path>
                                </svg>
                                Multiple Pick-up service
                            </li>
                            <li>&#8377; Transparent Billing</li>
                            <li>
                                <svg aria-hidden="true" width="20" focusable="false" data-prefix="fas"
                                    data-icon="ban" class="svg-inline--fa fa-ban fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z">
                                    </path>
                                </svg>
                                Free Cancelation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <button id="myBtn">Open Modal</button> --}}

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div>
@endsection

@section('script')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
