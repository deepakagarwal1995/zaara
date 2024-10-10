@extends('visitors.layout')

@section('content')
    <div class="homebanner btHome">
        <div class="container">
            <div class="hMsearchbx clearfix PR" title="Cab booking form">
                <h1>Book cab Online</h1>
                <!-- booking form here -->
                <ul class="tripselection nav-tabs">



                    <li class="active"><a href="#localtrip" title="Book cab for local">Local Trip</a></li>



                    <li><a href="#outstationtrip" title="Book cab for outstation">Outstation Trip</a></li>





                </ul>



                <div class="tab-content select_detail">



                    <div class="tab-pane in fade active" id="localtrip">



                        <form method="post" action="{{ route('local_cabs') }}" class="form-horizontal">
                            @csrf
                            <div class="inpbx">
                                <label>From</label>


                                @php
                                    if (isset($_GET['city']) && $_GET['city'] != '') {
                                        $loc_city = $_GET['city'];
                                    } else {
                                        $loc_city = '';
                                    }
                                @endphp
                                <input name="start_from" autocomplete="off" id="city-autocomplete"
                                    placeholder="Enter Pick Up City" required value="{{ $loc_city }}" />



                            </div>



                            <div class="inpbx">



                                <label for="lorndtrip">Package</label>



                                <select name="package" required id="lorndtrip">



                                    <option value='8' selected>8 Hours 80 Km</option>



                                    <option value='12'>12 Hours 120 Km</option>



                                </select>



                            </div>



                            <div class="inpbx">



                                <label>Departure</label>



                                <input type="text" name="start_on" id="lodate" readonly aria-invalid="false" required
                                    autocomplete="off" placeholder="Journey Date">



                            </div>



                            <div class="inpbx timebx">



                                <label for="lopickuptime">Pickup Time</label>



                                <select class="selectbox" id="lopickuptime" name="start_time" required="required">
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



                            <button class="btn_big" type="submit">Search</button>



                        </form>



                    </div>



                    <div class="tab-pane fade " id="outstationtrip">


                        <form method="post" action="{{ route('outstation_cabs') }}" class="form-horizontal">
                            @csrf



                            <div class="inpbx">



                                <label>From</label>



                                <input id="from-city" type="text" name="from_city" placeholder="Enter Pick Up City"
                                    required />
                                <input id="from-lat" type="hidden" name="from_lat" />
                                <input id="from-lng" type="hidden" name="from_lng" />



                            </div>






                            <div class="inpbx" id="oenddestidiv">



                                <label>To</label>
                                <input id="to-city" type="text" name="to_city" placeholder="Enter Destination City"
                                    required />

                                <input id="to-lat" type="hidden" name="to_lat" />
                                <input id="to-lng" type="hidden" name="to_lng" />





                            </div>






                            <div class="inpbx">



                                

                                <label>Departure</label>
                                <input type="text" name="start_on" autocomplete="off" readonly aria-invalid="false" id="ostartdate" required placeholder="Journey Start Date">
 



                            </div>
                            
        <div class="inpbx">



            <label>Return</label>
  
  
  
            <input type="text" name="end_on" autocomplete="off" readonly aria-invalid="false" id="oenddate" required placeholder="Journey End Date">
  
  
  
          </div>
  





                            <div class="inpbx timebx">



                                <label for="opickuptime">Pickup Time</label>



                                <select class="selectbox" name="pickuptime" required="required">
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


                            </div>



                            <button class="btn_big" type="submit">Search</button>



                        </form>



                    </div>





                </div>



                <!-- booking form end here -->
            </div>
        </div>
    </div>
    <!-- page banner and form start here -->
    <!-- service section Start here -->
    <section class="ourservice">
        <style>

        </style>
        <div class="container">
            <div class="main_head">Our Services</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 col-xs-12"> <a href="#">
                            <figure><svg aria-hidden="true" focusable="false" width="60" data-prefix="fas"
                                    data-icon="bed" class="svg-inline--fa fa-bed fa-w-20" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M176 256c44.11 0 80-35.89 80-80s-35.89-80-80-80-80 35.89-80 80 35.89 80 80 80zm352-128H304c-8.84 0-16 7.16-16 16v144H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v352c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-48h512v48c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V240c0-61.86-50.14-112-112-112z">
                                    </path>
                                </svg></figure>
                            <span>Hotels <i>Book your choice of hotels anywhere in India at best affordable
                                    rate.</i> </span>
                        </a> </div>
                    <div class="col-md-4 col-xs-6"> <a href="#">
                            <figure><svg aria-hidden="true" focusable="false" width="60" data-prefix="fas"
                                    data-icon="umbrella-beach" class="svg-inline--fa fa-umbrella-beach fa-w-20"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M115.38 136.9l102.11 37.18c35.19-81.54 86.21-144.29 139-173.7-95.88-4.89-188.78 36.96-248.53 111.8-6.69 8.4-2.66 21.05 7.42 24.72zm132.25 48.16l238.48 86.83c35.76-121.38 18.7-231.66-42.63-253.98-7.4-2.7-15.13-4-23.09-4-58.02.01-128.27 69.17-172.76 171.15zM521.48 60.5c6.22 16.3 10.83 34.6 13.2 55.19 5.74 49.89-1.42 108.23-18.95 166.98l102.62 37.36c10.09 3.67 21.31-3.43 21.57-14.17 2.32-95.69-41.91-187.44-118.44-245.36zM560 447.98H321.06L386 269.5l-60.14-21.9-72.9 200.37H16c-8.84 0-16 7.16-16 16.01v32.01C0 504.83 7.16 512 16 512h544c8.84 0 16-7.17 16-16.01v-32.01c0-8.84-7.16-16-16-16z">
                                    </path>
                                </svg></figure>
                            <span>Holiday Packages <i>Plan your domestic and Interantional vacation with and get
                                    best deal.</i> </span>
                        </a> </div>
                    <div class="col-md-4 col-xs-6"> <a href="#">
                            <figure><svg aria-hidden="true" width="60" focusable="false" data-prefix="fas"
                                    data-icon="ticket-alt" class="svg-inline--fa fa-ticket-alt fa-w-18" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z">
                                    </path>
                                </svg></figure>
                            <span>Bus Tickets <i>Book Non A.C., A.C. and luxury bus tickets for short and long
                                    distance at best rates.</i> </span>
                        </a> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end here -->
    <!-- our presence start -->
    <section class="popularcities" style="    background: #e9e9e9;">
        <div class="container">
            <div class="main_head">Our Presence in India</div>
            <div class="row">
                @foreach ($precence as $row)
                    <div class="col-md-4">
                        <div class="ppcity_bx1 ppcity_mumbai"> <a href="{{ route('index') }}?city={{ $row->name }}">
                                <span class="citytpname">{{ $row->name }}</span><span class="citydtl"> Book SUV, Sedan
                                    and
                                    hatchback car on rent in {{ $row->name }} for Outstation and local sightseeing at
                                    very competitive rates. <span class="citytp"><br>
                                        <strong>8 hour 80km:</strong>{{ $row->eight_hr }}rs. </span> <br><span
                                        class="citytp">
                                        <strong>12 hour 120km:</strong>{{ $row->twelve_hr }}rs. </span>
                                    <br><span class="btn btn-primary">Book Cab</span> </span> </a> </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!-- ours presence end here -->


    <section class="choose-car">
        <div class="container">
            <div class="main_head">Cab Service in India</div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="maiBx">
                        <div class="hmnconttx">
                            <h2 class="headhm2">Airport cab service</h2>
                            <nav>
                                <ul>
                                    @foreach ($Airport_cab_service as $row)
                                        <li><a href="{{ route('page', $row->slug) }}"
                                                title="{{ $row->title }}">{{ $row->title }}</a></li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="col-md-12 col-sm-12">
                        <div class="hmtrpcmnt luxcabbg">
                            <div class="hmnconttx ">
                                <h2 class="headhm2">Luxury Car Rental</h2>
                                <nav>
                                    <ul>
                                        @foreach ($Luxury_Car_Rental as $row)
                                            <li><a href="{{ route('page', $row->slug) }}"
                                                    title="{{ $row->title }}">{{ $row->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="hmtrpcmnt mumlcar">
                            <div class="hmnconttx">
                                <h2 class="headhm2">Local sightseeing package</h2>
                                <nav>
                                    <ul>
                                        @foreach ($Local_sightseeing_package as $row)
                                            <li><a href="{{ route('page', $row->slug) }}"
                                                    title="{{ $row->title }}">{{ $row->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="maiBx">
                        <div class="hmnconttx">
                            <h2 class="headhm2">Outstation Cab Booking</h2>
                            <nav>
                                <ul>
                                    @foreach ($Outstation_Cab_Booking as $row)
                                        <li><a href="{{ route('page', $row->slug) }}"
                                                title="{{ $row->title }}">{{ $row->title }}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Latest News Start Here -->
    <section id="latestUpdate">

        <div class="container">
            <div class="main_head">Get inspiration for your next trip</div>
            <div class="latestUpcont">
                <div class="latestupLeft">
                    @foreach ($two_blog as $row)
                        <div class="latestpostbx">
                            <figure><a href="{{ route('blog_detail', $row->slug) }}" title="{{ $row->img_alt }}"><img
                                        src="{{ Storage::url('blog/' . $row->img) }}" width="370" height="185"
                                        alt="{{ $row->img_alt }}"></a></figure>
                            <div class="latestmCnt">
                                <h4><a href="{{ route('blog_detail', $row->slug) }}">{{ $row->title }}</a></h4>
                                <p>
                                <p>{{ $row->sdescr }}
                                    <a href="{{ route('blog_detail', $row->slug) }}" class="read-more"> <i
                                            class="ion-ios-arrow-right read-more-right"></i></a>
                                </p>
                                </p>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="latestPostright">

                    @foreach ($four_blog as $row)
                        <div class="latestpostbx">
                            <figure><a href="{{ route('blog_detail', $row->slug) }}" title="{{ $row->img_alt }}"><img
                                        src="{{ Storage::url('blog/' . $row->img) }}" width="120" height="60"
                                        alt="{{ $row->img_alt }}"></a></figure>
                            <div class="latestmCnt">
                                <h6><a href="{{ route('blog_detail', $row->slug) }}">{{ $row->title }}</a></h6>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Latest News END Here -->

    <!-- footer start here -->
    <section class="video-sec">
        <video autoplay="" muted="" loop="" playsinline="">
            <source src="{{ config('app.url') }}/assets/images/video.mp4" type="video/mp4">
        </video>
    </section>
    <section class="ourbenefit" style="    margin-top: 0;">

        <div class="container PR">
            <h3 class="main_head">Why Choose Us</h3>
            <div class="col-md-12">
                <div class="col-md-4">
                    <h4>On Time Service</h4>
                    <p>We assure on-time service for every customer, any time of the day</p>
                </div>
                <div class="col-md-4">
                    <h4>Free Cancelation</h4>
                    <p>We offer free cancelation up to 24 hoursbefore the journey. Cancel within 24 hoursfor a
                        nominal fee of Rs. 250 only</p>
                </div>
                <div class="col-md-4">
                    <h4>Multiple Pickup</h4>
                    <p>We offer multiple pick and drop to our customer </p>
                </div>
            </div>
        </div>
    </section><!-- footer End here -->
    <section class="overview">
        <div class="container">
            <h3 class="main_head">Zaara Tours & Travels</h3>
            <p>When it comes to finding a cheap and efficient cab rental service in anywhere in India specially in
                Mumbai or Thane, you need look no further than <strong>Zaara Tours & Travels</strong>. With your
                family and friends, experience top tourist destinations in India, in our rental cars.</p>
            <p>Get ready for a road trip with <strong>Zaara Tours & Travels</strong>. We provide affordable and top
                quality taxi services in Mumbai, Thane, Delhi, Pune, Nashik and other metro cities. With a wide
                range of AC and non-AC vehicles at unbeatable rates, suitable for all types of travel, we have you
                covered for car rental across India. </p>
            <p>We have cars that best suit your needs, whether you're looking for a small car for a weekend getaway
                or a spacious vehicle for a family holiday.</p>
            <p>We not only pride on great cab service in Mumbai, but exceptional customer service. Rest assured that
                from pick-up to drop-off, we are different from others.</p>
            <p class="MB15">No matter where you need to go, at any time of day, our cabs are at your service.<br>
            </p>
        </div>
    </section>
    <!-- END Overview ZaaraTravels -->
@endsection
