<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <title>{{ $title ?? 'Zaara Tours & Travels - your travel partner for Outstation and Local in India' }}</title>
    <meta name="description"
        content="{{ $descr ?? 'Zaara Tours &  Travels offer wide range of car from Indica to Audi, Buses for Outstation, Local Sightseeing and Wedding, Call on +91 - 9933992786' }}">
    <meta name="keywords"
        content="book cab, hire cab online, hire car with driver, car on hire, car on rent, rent a car, hire cab in mumbai, outstation cab, taxi hire in mumbai" />
    <meta name="author" content="ZaaraTravels">
    <link rel="canonical" href="https://www.zaaratravels.in" />
    <!-- header start here -->
    <!-- Google tag (gtag.js) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('app.url') }}/assets/images/favicon.png">
    <meta name="theme-color" content="#38038E">
    <meta name="msapplication-navbutton-color" content="#38038E">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="author" content="ZaaraTravels">
    <meta name="robots" content="index, follow" />
    <link rel="stylesheet" href="{{ config('app.url') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{--
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}

    @yield('head')

</head>

<body>
    <div>
        <header>
            <!-- Main Navigation -->
            <div class="container">
                <div class="navbar-brand"><a href="{{ config('app.url') }}" title="Zaara Tours &  Travels"><img
                            src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg" width="200" height="58"
                            alt="Zaara Tours &  Travels"></a> </div>
                <a class="contactno" href="tel:+919933992786" title="Call for booking">+91-9933992786</a>
                <div class="topdeskmenu dropdown"> <a href="#" data-toggle="dropdown" class="btndropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.5" height="17.5" viewBox="0 0 25.5 17.5">
                            <defs>
                                <style>
                                    .a {
                                        fill: none;
                                        stroke: #333;
                                        stroke-linecap: round;
                                        stroke-width: 1.5px;
                                    }
                                </style>
                            </defs>
                            <g transform="translate(0.75 0.75)">
                                <line class="a" x1="21.31" transform="translate(2.69)"></line>
                                <line class="a" x1="24" transform="translate(0 8)"></line>
                                <line class="a" x1="16.139" transform="translate(7.861 16)"></line>
                            </g>
                        </svg>
                    </a>
                    <div class="dropdown-menu" onclick="event.stopPropagation()">
                        <div class="dropnavinside"> <span class="closedropdown deskhide" style="display: none;">
                                <svg aria-hidden="true" width="12" focusable="false" data-prefix="fas"
                                    data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                    <path fill="currentColor"
                                        d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                                    </path>
                                </svg>
                            </span>
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>

                                <li><a href="{{ route('driver_registration') }}">Driver Registration</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>

                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                            <p class="deskhide"> <strong>Booking:</strong> <a href="mailto:info@zaaratravels.in"
                                    title="Booking Email">info@zaaratravels.in</a><br>
                                <strong>Billing:</strong> <a href="mailto:info@zaaratravels.in"
                                    title="Billing Email">info@zaaratravels.in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- header end here -->
        <!-- page banner and form start here -->

        @yield('content')

    </div>
    <!-- footer start here -->

    @php
        $fo_page = App\Models\Pages::where('status', '1')->where('is_home', '1')->latest()->take(6)->get();
    @endphp
    <footer class="footer-wrapper">
        <div class="container" style="    padding: 50px 15px;">
            <div id="footer">
                <div class="col-md-3 col-xs-12">
                    <h5>Overview</h5>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('termscondition') }}" title="terms and condition">Terms
                                &amp; Condition </a></li>
                        <li><a href="{{ route('privacypolicy') }}" title="privacy policy">Privacy Policy
                            </a></li>
                        <li><a href="{{ route('cancelation_policy') }}" title="cancelation policy">Cancelation
                                Policy</a></li>
                        <li><a href="{{ route('driver_registration') }}">Driver Registration</a></li>
                        <li><a href="{{ route('blog') }}" title="Blog">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-12">
                    <h5>Service Type</h5>
                    <ul>

                        @foreach ($fo_page as $row)
                            <li><a href="{{ route('page', $row->slug) }}"
                                    title="{{ $row->title }}">{{ $row->title }}</a></li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-md-3 col-xs-12">
                    <div class="ML10">
                        <h5>Social Profile</h5>
                        <div class="clearfix social">
                            <a class="sc_facbook" target="_blank" title="Facebook profile"
                                href="https://www.facebook.com/zaaratravelslk/">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" width="14"
                                    height="14" data-icon="facebook-f"
                                    class="svg-inline--fa fa-facebook-f fa-w-10" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg>
                            </a>

                            <a class="sc_twitter" title="Tweeter Profile" target="_blank"
                                href="http://www.twitter.com/zaaratravels">
                                <svg aria-hidden="true" focusable="false" width="14" height="14"
                                    data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg>
                            </a>

                            <a class="sc_facbook" target="_blank" title="Linkedin profile"
                                href="https://www.linkedin.com/company/zaaratravels">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" width="14"
                                    height="14" data-icon="linkedin-in"
                                    class="svg-inline--fa fa-linkedin-in fa-w-14" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg>
                            </a>
                            <a class="sc_instagram" title="Instagram profile" target="_blank"
                                href="http://instagram.com/zaaratravels">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" width="14"
                                    height="14" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg>
                            </a>
                            <a class="sc_pinterest" title="pinterest profile" target="_blank"
                                href="https://www.pinterest.com/zaaratravels/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"
                                        fill="currentColor" />
                                </svg>
                            </a>

                            <a class="sc_youtube" title="Youtube profile" target="_blank"
                                href="https://www.youtube.com/channel/zaaratravels">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="14"
                                    height="14" viewBox="0 0 384 512">
                                    <path
                                        d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z" />
                                </svg>
                            </a>
                        </div>
                        <h5>We Accept All Card</h5>
                        <div class="card_ico">
                            <span>
                                <svg aria-hidden="true" width="35" focusable="false" data-prefix="fab"
                                    data-icon="cc-amex" class="svg-inline--fa fa-cc-amex fa-w-18" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M325.1 167.8c0-16.4-14.1-18.4-27.4-18.4l-39.1-.3v69.3H275v-25.1h18c18.4 0 14.5 10.3 14.8 25.1h16.6v-13.5c0-9.2-1.5-15.1-11-18.4 7.4-3 11.8-10.7 11.7-18.7zm-29.4 11.3H275v-15.3h21c5.1 0 10.7 1 10.7 7.4 0 6.6-5.3 7.9-11 7.9zM279 268.6h-52.7l-21 22.8-20.5-22.8h-66.5l-.1 69.3h65.4l21.3-23 20.4 23h32.2l.1-23.3c18.9 0 49.3 4.6 49.3-23.3 0-17.3-12.3-22.7-27.9-22.7zm-103.8 54.7h-40.6v-13.8h36.3v-14.1h-36.3v-12.5h41.7l17.9 20.2zm65.8 8.2l-25.3-28.1L241 276zm37.8-31h-21.2v-17.6h21.5c5.6 0 10.2 2.3 10.2 8.4 0 6.4-4.6 9.2-10.5 9.2zm-31.6-136.7v-14.6h-55.5v69.3h55.5v-14.3h-38.9v-13.8h37.8v-14.1h-37.8v-12.5zM576 255.4h-.2zm-194.6 31.9c0-16.4-14.1-18.7-27.1-18.7h-39.4l-.1 69.3h16.6l.1-25.3h17.6c11 0 14.8 2 14.8 13.8l-.1 11.5h16.6l.1-13.8c0-8.9-1.8-15.1-11-18.4 7.7-3.1 11.8-10.8 11.9-18.4zm-29.2 11.2h-20.7v-15.6h21c5.1 0 10.7 1 10.7 7.4 0 6.9-5.4 8.2-11 8.2zm-172.8-80v-69.3h-27.6l-19.7 47-21.7-47H83.3v65.7l-28.1-65.7H30.7L1 218.5h17.9l6.4-15.3h34.5l6.4 15.3H100v-54.2l24 54.2h14.6l24-54.2v54.2zM31.2 188.8l11.2-27.6 11.5 27.6zm477.4 158.9v-4.5c-10.8 5.6-3.9 4.5-156.7 4.5 0-25.2.1-23.9 0-25.2-1.7-.1-3.2-.1-9.4-.1 0 17.9-.1 6.8-.1 25.3h-39.6c0-12.1.1-15.3.1-29.2-10 6-22.8 6.4-34.3 6.2 0 14.7-.1 8.3-.1 23h-48.9c-5.1-5.7-2.7-3.1-15.4-17.4-3.2 3.5-12.8 13.9-16.1 17.4h-82v-92.3h83.1c5 5.6 2.8 3.1 15.5 17.2 3.2-3.5 12.2-13.4 15.7-17.2h58c9.8 0 18 1.9 24.3 5.6v-5.6c54.3 0 64.3-1.4 75.7 5.1v-5.1h78.2v5.2c11.4-6.9 19.6-5.2 64.9-5.2v5c10.3-5.9 16.6-5.2 54.3-5V80c0-26.5-21.5-48-48-48h-480c-26.5 0-48 21.5-48 48v109.8c9.4-21.9 19.7-46 23.1-53.9h39.7c4.3 10.1 1.6 3.7 9 21.1v-21.1h46c2.9 6.2 11.1 24 13.9 30 5.8-13.6 10.1-23.9 12.6-30h103c0-.1 11.5 0 11.6 0 43.7.2 53.6-.8 64.4 5.3v-5.3H363v9.3c7.6-6.1 17.9-9.3 30.7-9.3h27.6c0 .5 1.9.3 2.3.3H456c4.2 9.8 2.6 6 8.8 20.6v-20.6h43.3c4.9 8-1-1.8 11.2 18.4v-18.4h39.9v92h-41.6c-5.4-9-1.4-2.2-13.2-21.9v21.9h-52.8c-6.4-14.8-.1-.3-6.6-15.3h-19c-4.2 10-2.2 5.2-6.4 15.3h-26.8c-12.3 0-22.3-3-29.7-8.9v8.9h-66.5c-.3-13.9-.1-24.8-.1-24.8-1.8-.3-3.4-.2-9.8-.2v25.1H151.2v-11.4c-2.5 5.6-2.7 5.9-5.1 11.4h-29.5c-4-8.9-2.9-6.4-5.1-11.4v11.4H58.6c-4.2-10.1-2.2-5.3-6.4-15.3H33c-4.2 10-2.2 5.2-6.4 15.3H0V432c0 26.5 21.5 48 48 48h480.1c26.5 0 48-21.5 48-48v-90.4c-12.7 8.3-32.7 6.1-67.5 6.1zm36.3-64.5H575v-14.6h-32.9c-12.8 0-23.8 6.6-23.8 20.7 0 33 42.7 12.8 42.7 27.4 0 5.1-4.3 6.4-8.4 6.4h-32l-.1 14.8h32c8.4 0 17.6-1.8 22.5-8.9v-25.8c-10.5-13.8-39.3-1.3-39.3-13.5 0-5.8 4.6-6.5 9.2-6.5zm-57 39.8h-32.2l-.1 14.8h32.2c14.8 0 26.2-5.6 26.2-22 0-33.2-42.9-11.2-42.9-26.3 0-5.6 4.9-6.4 9.2-6.4h30.4v-14.6h-33.2c-12.8 0-23.5 6.6-23.5 20.7 0 33 42.7 12.5 42.7 27.4-.1 5.4-4.7 6.4-8.8 6.4zm-42.2-40.1v-14.3h-55.2l-.1 69.3h55.2l.1-14.3-38.6-.3v-13.8H445v-14.1h-37.8v-12.5zm-56.3-108.1c-.3.2-1.4 2.2-1.4 7.6 0 6 .9 7.7 1.1 7.9.2.1 1.1.5 3.4.5l7.3-16.9c-1.1 0-2.1-.1-3.1-.1-5.6 0-7 .7-7.3 1zm20.4-10.5h-.1zm-16.2-15.2c-23.5 0-34 12-34 35.3 0 22.2 10.2 34 33 34h19.2l6.4-15.3h34.3l6.6 15.3h33.7v-51.9l31.2 51.9h23.6v-69h-16.9v48.1l-29.1-48.1h-25.3v65.4l-27.9-65.4h-24.8l-23.5 54.5h-7.4c-13.3 0-16.1-8.1-16.1-19.9 0-23.8 15.7-20 33.1-19.7v-15.2zm42.1 12.1l11.2 27.6h-22.8zm-101.1-12v69.3h16.9v-69.3z">
                                    </path>
                                </svg>
                            </span> <span>
                                <svg aria-hidden="true" width="35" focusable="false" data-prefix="fab"
                                    data-icon="cc-mastercard" class="svg-inline--fa fa-cc-mastercard fa-w-18"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M482.9 410.3c0 6.8-4.6 11.7-11.2 11.7-6.8 0-11.2-5.2-11.2-11.7 0-6.5 4.4-11.7 11.2-11.7 6.6 0 11.2 5.2 11.2 11.7zm-310.8-11.7c-7.1 0-11.2 5.2-11.2 11.7 0 6.5 4.1 11.7 11.2 11.7 6.5 0 10.9-4.9 10.9-11.7-.1-6.5-4.4-11.7-10.9-11.7zm117.5-.3c-5.4 0-8.7 3.5-9.5 8.7h19.1c-.9-5.7-4.4-8.7-9.6-8.7zm107.8.3c-6.8 0-10.9 5.2-10.9 11.7 0 6.5 4.1 11.7 10.9 11.7 6.8 0 11.2-4.9 11.2-11.7 0-6.5-4.4-11.7-11.2-11.7zm105.9 26.1c0 .3.3.5.3 1.1 0 .3-.3.5-.3 1.1-.3.3-.3.5-.5.8-.3.3-.5.5-1.1.5-.3.3-.5.3-1.1.3-.3 0-.5 0-1.1-.3-.3 0-.5-.3-.8-.5-.3-.3-.5-.5-.5-.8-.3-.5-.3-.8-.3-1.1 0-.5 0-.8.3-1.1 0-.5.3-.8.5-1.1.3-.3.5-.3.8-.5.5-.3.8-.3 1.1-.3.5 0 .8 0 1.1.3.5.3.8.3 1.1.5s.2.6.5 1.1zm-2.2 1.4c.5 0 .5-.3.8-.3.3-.3.3-.5.3-.8 0-.3 0-.5-.3-.8-.3 0-.5-.3-1.1-.3h-1.6v3.5h.8V426h.3l1.1 1.4h.8l-1.1-1.3zM576 81v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V81c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM64 220.6c0 76.5 62.1 138.5 138.5 138.5 27.2 0 53.9-8.2 76.5-23.1-72.9-59.3-72.4-171.2 0-230.5-22.6-15-49.3-23.1-76.5-23.1-76.4-.1-138.5 62-138.5 138.2zm224 108.8c70.5-55 70.2-162.2 0-217.5-70.2 55.3-70.5 162.6 0 217.5zm-142.3 76.3c0-8.7-5.7-14.4-14.7-14.7-4.6 0-9.5 1.4-12.8 6.5-2.4-4.1-6.5-6.5-12.2-6.5-3.8 0-7.6 1.4-10.6 5.4V392h-8.2v36.7h8.2c0-18.9-2.5-30.2 9-30.2 10.2 0 8.2 10.2 8.2 30.2h7.9c0-18.3-2.5-30.2 9-30.2 10.2 0 8.2 10 8.2 30.2h8.2v-23zm44.9-13.7h-7.9v4.4c-2.7-3.3-6.5-5.4-11.7-5.4-10.3 0-18.2 8.2-18.2 19.3 0 11.2 7.9 19.3 18.2 19.3 5.2 0 9-1.9 11.7-5.4v4.6h7.9V392zm40.5 25.6c0-15-22.9-8.2-22.9-15.2 0-5.7 11.9-4.8 18.5-1.1l3.3-6.5c-9.4-6.1-30.2-6-30.2 8.2 0 14.3 22.9 8.3 22.9 15 0 6.3-13.5 5.8-20.7.8l-3.5 6.3c11.2 7.6 32.6 6 32.6-7.5zm35.4 9.3l-2.2-6.8c-3.8 2.1-12.2 4.4-12.2-4.1v-16.6h13.1V392h-13.1v-11.2h-8.2V392h-7.6v7.3h7.6V416c0 17.6 17.3 14.4 22.6 10.9zm13.3-13.4h27.5c0-16.2-7.4-22.6-17.4-22.6-10.6 0-18.2 7.9-18.2 19.3 0 20.5 22.6 23.9 33.8 14.2l-3.8-6c-7.8 6.4-19.6 5.8-21.9-4.9zm59.1-21.5c-4.6-2-11.6-1.8-15.2 4.4V392h-8.2v36.7h8.2V408c0-11.6 9.5-10.1 12.8-8.4l2.4-7.6zm10.6 18.3c0-11.4 11.6-15.1 20.7-8.4l3.8-6.5c-11.6-9.1-32.7-4.1-32.7 15 0 19.8 22.4 23.8 32.7 15l-3.8-6.5c-9.2 6.5-20.7 2.6-20.7-8.6zm66.7-18.3H408v4.4c-8.3-11-29.9-4.8-29.9 13.9 0 19.2 22.4 24.7 29.9 13.9v4.6h8.2V392zm33.7 0c-2.4-1.2-11-2.9-15.2 4.4V392h-7.9v36.7h7.9V408c0-11 9-10.3 12.8-8.4l2.4-7.6zm40.3-14.9h-7.9v19.3c-8.2-10.9-29.9-5.1-29.9 13.9 0 19.4 22.5 24.6 29.9 13.9v4.6h7.9v-51.7zm7.6-75.1v4.6h.8V302h1.9v-.8h-4.6v.8h1.9zm6.6 123.8c0-.5 0-1.1-.3-1.6-.3-.3-.5-.8-.8-1.1-.3-.3-.8-.5-1.1-.8-.5 0-1.1-.3-1.6-.3-.3 0-.8.3-1.4.3-.5.3-.8.5-1.1.8-.5.3-.8.8-.8 1.1-.3.5-.3 1.1-.3 1.6 0 .3 0 .8.3 1.4 0 .3.3.8.8 1.1.3.3.5.5 1.1.8.5.3 1.1.3 1.4.3.5 0 1.1 0 1.6-.3.3-.3.8-.5 1.1-.8.3-.3.5-.8.8-1.1.3-.6.3-1.1.3-1.4zm3.2-124.7h-1.4l-1.6 3.5-1.6-3.5h-1.4v5.4h.8v-4.1l1.6 3.5h1.1l1.4-3.5v4.1h1.1v-5.4zm4.4-80.5c0-76.2-62.1-138.3-138.5-138.3-27.2 0-53.9 8.2-76.5 23.1 72.1 59.3 73.2 171.5 0 230.5 22.6 15 49.5 23.1 76.5 23.1 76.4.1 138.5-61.9 138.5-138.4z">
                                    </path>
                                </svg>
                            </span> <span>
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="cc-visa"
                                    width="35" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43.5 16-43.5-.2.3 3.3-9.1 5.3-14.9l2.8 13.4zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.8 4 29.9 9.8 42.2 17.1l35.8 135h42.5zm94.4.2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2.2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2.1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.8 23.3 4.8 23.3H528z">
                                    </path>
                                </svg>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="ML10">
                        <h5>Translate</h5>
                        <div class="clearfix social">
                            <div id="google_translate_element"></div>

                            <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en'
                                    }, 'google_translate_element');
                                }
                            </script>

                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                            </script>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="copyright">
            <p style="    margin: 0;
    font-size: 14px;">© 2022 <span style="    color: #d9d9d9;">Zaara
                    Travel</span> All
                Rights Reserved. Developed by
                <a href="https://svtindia.in" style="    color: #d9d9d9;">SVT INDIA</a>
            </p>
        </div>
    </footer>

    <div class="contactInfo">
        <ul>
            <li>
                <a href="https://www.zaaratravels.in"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"
                            fill="currentColor"></path>
                    </svg>
                    <span>Home</span>
                </a>
            </li>
            <li><a href="https://wa.me/+919933992786?text=Hello" title="send watsapp msg" target="_blank"><svg
                        xmlns="http://www.w3.org/2000/svg" width="21" viewBox="0 0 448 512">
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                            fill="currentColor" />
                    </svg> <span>Message</span></a></li>
            <li><a href="tel:+919933992786" title="Make a call"> <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512" width="20">
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                            fill="currentColor" />
                    </svg> <span>Call</span> </a></li>
            <li>
                <a target="_blank" rel="nofollow" title="Share this Content" href="javascript:;"
                    onclick="const title = document.title;const text = &quot;Check this out!&quot;;	const url = window.location.href;navigator.share({title,text,url});;"><svg
                        width="22"viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.5 17.5C15.7426 17.5 16.75 16.4926 16.75 15.25C16.75 14.0074 15.7426 13 14.5 13C13.2574 13 12.25 14.0074 12.25 15.25C12.25 16.4926 13.2574 17.5 14.5 17.5Z"
                            stroke="#1D1F1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M5.5 12.25C6.74264 12.25 7.75 11.2426 7.75 10C7.75 8.75736 6.74264 7.75 5.5 7.75C4.25736 7.75 3.25 8.75736 3.25 10C3.25 11.2426 4.25736 12.25 5.5 12.25Z"
                            stroke="#1D1F1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.44263 11.1326L12.5651 14.1176" stroke="#1D1F1E" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M14.5 7C15.7426 7 16.75 5.99264 16.75 4.75C16.75 3.50736 15.7426 2.5 14.5 2.5C13.2574 2.5 12.25 3.50736 12.25 4.75C12.25 5.99264 13.2574 7 14.5 7Z"
                            stroke="#1D1F1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.5576 5.88257L7.44263 8.86757" stroke="#1D1F1E" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg> <span>Share</span></a>
            </li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('USER_MAP_KEY') }}&libraries=places">
    </script>

    <script defer type="text/javascript" src="{{ config('app.url') }}/assets/js/bootstrap.min.js"></script>
    <script defer type="text/javascript" src="{{ config('app.url') }}/assets/js/bootstrap-datepicker.js"></script>
    <script defer type="text/javascript" src="{{ config('app.url') }}/assets/js/custom.js"></script>
{{--

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
    @yield('script')

    <script>
        $(document).ready(function() {
            $('#city-autocomplete').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('autocomplete.city') }}",
                        dataType: "json",
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response(data); // Return data for autocomplete
                        }
                    });
                },
                minLength: 2, // Start searching after 2 characters
                select: function(event, ui) {
                    console.log("Selected city: " + ui.item.label); // Do something on selection
                }
            });
        });

        function changeTab(elem1, elem2) {
            $(elem2).addClass("hide-search-tab");
            $(elem1).removeClass("hide-search-tab");
        }
    </script>
    <script>
        function initializeAutocomplete() {
            var fromInput = document.getElementById('from-city');
            var toInput = document.getElementById('to-city');

            var fromAutocomplete = new google.maps.places.Autocomplete(fromInput, {
                types: ['(cities)'],
                componentRestrictions: {
                    country: 'IN'
                } // Restrict to India
            });

            var toAutocomplete = new google.maps.places.Autocomplete(toInput, {
                types: ['(cities)'],
                componentRestrictions: {
                    country: 'IN'
                } // Restrict to India
            });

            // Listener for "From City"
            fromAutocomplete.addListener('place_changed', function() {
                var fromPlace = fromAutocomplete.getPlace();
                document.getElementById('from-lat').value = fromPlace.geometry.location.lat();
                document.getElementById('from-lng').value = fromPlace.geometry.location.lng();
            });

            // Listener for "To City"
            toAutocomplete.addListener('place_changed', function() {
                var toPlace = toAutocomplete.getPlace();
                document.getElementById('to-lat').value = toPlace.geometry.location.lat();
                document.getElementById('to-lng').value = toPlace.geometry.location.lng();
            });
        }

        google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
    </script>

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="e850e3ac-d147-4866-ae74-f2e8b75fc9fd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>


</body>

</html>
