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



            <div class="col-md-12">
                <div style="    padding: 10px;
    margin-bottom: 10px;">
                    <div class="latestpostbx" style="width: 100%">
                        <figure><a href="{{ route('blog_detail', $blog->slug) }}" title="{{ $blog->img_alt }}"><img
                                    src="{{ Storage::url('blog/' . $blog->img) }}" width="370" height="185"
                                    alt="{{ $blog->img_alt }}"></a></figure>
                        <div class="latestmCnt">
                            <h4><a href="{{ route('blog_detail', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            <div>{!! $blog->descr !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
