@extends('visitors.layout', ['title' => $blog->title, 'descr' => $blog->sdescr])

@section('content')
    <div class="homebanner inbanner">
        <div class="container">
            <h1 class="inhead">{{ $blog->title }}</h1>
        </div>
    </div>
    <div class="bradcrum">
        <div class="container">
            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item"
                        href="hhttps://www.zaaratravels.in"> <span itemprop="name">Book Cab</span></a> »
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <h3 itemprop="item"> <span itemprop="name">{{ $blog->title }}</span></h3>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>


    <section id="latestUpdate">

        <div class="container">
            <div class="brd_bot">
                <h1 class="mnpgHead"><span>{{ $blog->title }}</span></h1>
                <p>{{ $blog->sdescr }}</p>
            </div>

              <div class="clearfix PB20">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h2 class="page_head2 PB5">{{ $blog->external_title }}</h2>
                  <ul class="mumbadarList">
                    @foreach ($butns as $row)
                    <li><a href="{{ route('page', $row->slug) }}"
                        title="{{ $row->title }}">{{ $row->title }}</a></li>
                    @endforeach

                  </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="siderates">
                    <div class="page_head2 PB10">Varanasi Taxi Fare Charts</div>
                        <!-- Varanasi local rates -->
                        <div id="localvaranasi"><table class="fare_tbl2" cellpadding="0" cellspacing="0" border="0" width="100%">
          <thead><tr>
          <th>Vehicle Type</th>
          <th>8Hrs 80km</th>
          <th>12Hrs 120km</th>
          <th>Extra HR/Km</th>
          </tr></thead>
          <tbody>
            @foreach ($local_cities as $row)
            <tr><td>{{ $row->cab->title }}</td><td>{{ $row->eight_hr }}</td><td>{{ $row->twelve_hr }}</td><td>{{ $row->extra_hr }}/Km</td></tr>
            @endforeach

        </tbody></table></div>
                      <!-- Varanasi local rates -->
                  </div>
                </div>
              </div>
            <div class="col-md-12">
                <div>{!! $blog->descr !!}
                </div>
            </div>


        </div>
    </section>
@endsection
