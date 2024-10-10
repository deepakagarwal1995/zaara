@extends('visitors.layout', ['title' => 'Contact Us | Zaara Tours & Travels', 'descr' => 'Contact Us | Zaara Tours & Travels'])

@section('content')
    <div class="homebanner inbanner">
        <div class="container">
            <h1 class="inhead">Contact Us</h1>
        </div>
    </div>
    <div class="bradcrum">
        <div class="container">
            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item"
                        href=https://www.zaaratravels.in"> <span itemprop="name">Book Cab</span></a> »
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <h3 itemprop="item"> <span itemprop="name">Contact Us</span></h3>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>


    <section class="page_content2">
        <div class="container">

            <div class="contact-content-box mb-50">
                <div class="section-title mb-45 wow fadeInUp">

                    <h2>Ready to Travel Us <span class="thin">for Better Adventure</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-icon-box mb-50 wow fadeInDown">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Locations</h4>
                                <p>Rani Garden Geeta Colony East Delhi 110031</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-icon-box mb-50 wow fadeInDown">
                            <div class="icon">
                                <i class="fal fa-envelope-open"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Email Us</h4>

                                <p><a href="mailto:info@zaaratravel.com">info@zaaratravel.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-icon-box mb-50 wow fadeInDown">
                            <div class="icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Hotline</h4>
                                <p><a href="tel:+919933992786">+919933992786</a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
