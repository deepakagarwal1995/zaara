@extends('visitors.layout', ['title' => 'Blogs | Zaara Tours & Travels', 'descr' => 'Blogs | Zaara Tours & Travels'])

@section('content')
    <div class="homebanner inbanner">
        <div class="container">
            <h1 class="inhead">Blogs</h1>
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
                    <h3 itemprop="item"> <span itemprop="name">Blogs</span></h3>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>


    <section id="latestUpdate">

        <div class="container">


            @foreach ($blog as $row)
                <div class="col-md-4">
                    <div style="    padding: 10px;
    margin-bottom: 10px;">
                        <div class="latestpostbx" style="width: 100%">
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
                    </div>
                </div>
            @endforeach


        </div>
    </section>
@endsection
