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
                                <option value="{{ $request->ptime }}">{{ $request->ptime }}</option>

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
            <form action="{{ route('payment') }}" method="post">
                @csrf

                <input type="hidden" name="package" value="{{ $request->package }}" />
                <input type="hidden" name="type" value="{{ $request->type }}" />
                <input type="hidden" name="cab_id" value="{{ $request->cab_id }}" />
                <input type="hidden" name="price" value="{{ $request->price }}" />
                <div class="clearfix">
                    <div class="col-md-8 col-sm-12">
                        <div class="bookCutdtl">
                            <h3>Booking Detail</h3>


                            <div class="formGrp">
                                <ul class="clearfix">
                                    <li>
                                        <label>Name</label>
                                        <input type="text" pattern="[A-Za-z- ]+" placeholder="Enter your name"
                                            name="name" id="name" required value="">
                                    </li>
                                    <li>
                                        <label>Contact No.</label>
                                        <input type="number" pattern="[6789][0-9]{9}" placeholder="Enter your Mobile No."
                                            id="mobno" name="phone" required value="">
                                    </li>
                                    <li>
                                        <label>Email</label>
                                        <input type="email" placeholder="Enter your Email."
                                            name="email" required value="">
                                    </li>

                                    <li>
                                        <label>Pickup Date</label>
                                        <input type="text" readonly name="pdate" required
                                            value="{{ $request->pdate }}">
                                    </li>
                                    <li>
                                        <label>Pickup Time</label>
                                        <input type="text" readonly name="ptime" required
                                            value="{{ $request->ptime }}">
                                    </li>
                                    <li class="w100per">
                                        <label>Pickup Address</label>
                                        <textarea id="addr" rows="3" name="address" placeholder="Enter pickup location" required></textarea>
                                    </li>
                                </ul>
                                <ul class="clearfix">
                                    <li>
                                        <label>Pickup City</label>
                                        <input type="text" placeholder="City" name="plocation" readonly
                                            value="{{ $request->plocation }}" required>
                                    </li>

                                </ul>
                                <button class="hide-search-tab" type="submit">Book</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">

                        <!--<div class="exploretrpdetail">Your Trip Detail</div>-->

                        <div class="bookedCRdtl">

                            <h3 class="trphead2">Trip Summary</h3>

                            <div id="trpsum_open">

                                <div class="trpSumm">
                                    <div class="carBoption tab-index-1 " style="    padding: 6px;">
                                        <div class="cabListFdtl">

                                            <figure style="    width: 30%;"><img
                                                    src="{{ Storage::url('images/' . $cab->photo) }}" alt="">
                                            </figure>


                                            <div class="car_detail" style="    width: 70%;">

                                                <h4>{{ $cab->name }} <span>({{ $cab->title }})</span></h4>

                                                <p><strong>
                                                        @if ($cab->ac_cab == 1)
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
                                                    </svg> {{ $cab->capacity }}</p>

                                            </div>
                                        </div>
                                        <p><span>Service :</span> {{ $request->type }}</p>

                                        <p><span>From :</span> <i id="startdesti">{{ $request->plocation }}</i></p>

                                        <p><span>Duration:</span> <i id="days">
                                                @if ($request->package == 8)
                                                    8 Hours 80 Km
                                                @else
                                                    12 Hours 120 Km
                                                @endif
                                            </i> </p>
                                    </div>




                                </div>

                                <div class="faresumm">

                                    <h3>Fare Summary</h3>

                                    <p class="servicetx clearfix"><span>Total</span> <span id="totalbk"
                                            style="float: none;">Rs. {{ $request->price }}</span> </p>

                                    <ul>

                                        <li>

                                            <label><strong><input type="radio" name="pay_type" value="15"
                                                        required></strong> Pay Booking Amount (15%) <span id="advbk"
                                                    style="float:right;">&#8377;
                                                    {{ round(($request->price * 15) / 100) }}</span></label>

                                        </li>

                                        <li>

                                            <label><strong><input type="radio" name="pay_type" value="50"
                                                        required></strong> Pay Booking Amount (50%) <span id="advbk"
                                                    style="float:right;">&#8377;
                                                    {{ round(($request->price * 50) / 100) }}</span></label>

                                        </li>
                                        <li>

                                            <label><strong><input type="radio" name="pay_type" value="100"
                                                        required></strong> Pay Booking Amount (Full) <span id="advbk"
                                                    style="float:right;">&#8377; {{ $request->price }}</span></label>

                                        </li>

                                    </ul>

                                </div>

                                <div class="bkterms">

                                    <h5><strong>Extra Charges</strong></h5>

                                    Tolls, parking and state permits as per actuals.<br>

                                    Extra Km beyond <strong><span id="rndtrp">
                                            @if ($request->package == 8)
                                                80 Kms
                                            @else
                                                120 Kms
                                            @endif
                                            <span></strong> will be charge : <span
                                        id="rate1">Rs.{{ $cab->km_charges }}/km</span>

                                </div>

                                <p class="bkterms">

                                    <input type="checkbox" required="" id="agreecondition" checked="checked">

                                    By clicking this button, I understand &amp; agree with the <a
                                        href="{{ route('cancelation_policy') }}">Cancellation Policy</a>, the <a
                                        href="{{ route('privacypolicy') }}">Privacy Policy</a> and <a
                                        href="{{ route('termscondition') }}">Terms &amp; Conditions</a> of hire cab tours
                                    and travels service.
                                </p>

                                <button class="bookcb" type="submit">Book</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
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
