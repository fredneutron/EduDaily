<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EduDaily</title>
    <meta name="theme-color" content="#55aaff">
    <meta name="twitter:card" content="">
    <meta property="og:type" content="website">
    <meta name="description" content="EduDaily is an educational portal for all tertiary institution related news in Nigeria. ">
    <!-- include navigation -->
    @include('head')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
</head>

<body>
    <div class="container-fluid">
        <!-- include navigation -->
        @include('navigation')

        <div class="simple-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($slides as $slide)
                        <div class="swiper-slide" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)) , url(&quot;{{ $slide->featured_image != null ? $slide->featured_image : '/img/default-featured-image.jpeg' }}&quot;) center center / cover no-repeat;opacity: 1;transform: perspective(0px);">
                            <div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                @foreach($slide->tags->take(3) as $tag)
                                                    <span class="badge rounded-pill bg-info title">{{ $tag->name }}</span>
                                                @endforeach
                                                <h1 style="color: var(--bs-light);margin-bottom: 5%;font-weight: bold;"><a type="color: var(--bs-light) !important;" href="/post/{{ $slide->slug }}">{{ $slide->title }}</a></h1>
                                                <p class="header-p" style="color: var(--bs-light) !important;"> {!! Str::limit(strip_tags($slide->content), 180, '...') !!}</p>
                                            </div>
                                            <div class="col-lg-3 col-xl-3"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row">
                                            <div class="col-lg-7 col-xl-6" style="padding: 2%;">
                                                <div style="font-size: 12px;"><img style="border-radius: 30px;width: 30px;height: 30px;" src="{{ $slide->author->avatar != null ? $slide->author->avatar : '/img/cM6tLj13_400x400.jpeg' }}"><span style="color: var(--bs-light);margin-left: 5px;margin-right: 10px;">{{ $slide->author->name }}</span><span style="color: var(--bs-light);"><i class="fa fa-calendar-o" style="color: var(--bs-light);"></i>&nbsp; &nbsp;{{ $slide->publish_date->diffForHumans() }}</span></div>
                                            </div>
                                            <div class="col-lg-3 col-xl-4"></div>
                                            <div class="col-lg-2 col-xl-2 text-end .swiper-pag" style="padding: 5px 0;"><button class="btn btn-primary swiper-prev" type="button" style="border-radius: 25px;background: var(--bs-light);margin-right: 5px;"><i class="fas fa-less-than" style="color: var(--bs-primary);"></i></button><button class="btn btn-primary swiper-next" type="button" style="border-radius: 25px;background: var(--bs-light);"><i class="fas fa-greater-than" style="color: var(--bs-primary);"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="row blog-b">
            <div class="col">
                <div class="row">
                    <div class="col-xl-12" style="padding-bottom: 20px;">
                        <h4 style="font-weight: bold;">Latest Articles</h4>
                        <div class="row" id="posts">
                            @foreach($posts as $post)
                                <div class="col-lg-6 col-xl-4">
                                    @if($post->featured_image != null)
                                        @if(mt_rand(1, 100)  < 50)
                                            <div class="image-card" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(&quot;{{ $post->featured_image }}&quot;) center center / cover no-repeat;">
                                                <div><a href="/post/{{ $post->slug }}">
                                                    @foreach($post->tags->take(3) as $tag)
                                                        <span class="badge rounded-pill bg-info title">{{ $tag->name }}</span>
                                                    @endforeach
                                                    <h5 style="color: var(--bs-gray-100);">{{ $post->title }}</h5>
                                                    <p></p>
                                                    <div style="font-size: 12px;">
                                                        <img style="border-radius: 20px;width: 20px;height: 20px;" src="{{ $post->author->avatar != null ? $post->author->avatar : '/img/cM6tLj13_400x400.jpeg' }}">
                                                        <span style="color: var(--bs-light);margin-left: 5px;margin-right: 10px;">{{ $post->author->name}}</span>
                                                        <span style="color: var(--bs-light);"><i class="fa fa-calendar-o"></i>&nbsp; &nbsp;{{ $post->publish_date->diffForHumans() }}</span>
                                                    </div></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="image-card-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(&quot;{{ $post->featured_image }}&quot;) center center / cover no-repeat;">
                                                <a href="/post/{{ $post->slug }}">
                                                <div class="c-top">
                                                    @foreach($post->tags->take(3) as $tag)
                                                        <span class="badge rounded-pill bg-info title">{{ $tag->name }}</span>
                                                    @endforeach
                                                </div>
                                                <div class="c-bottom">
                                                    <h5>{{ $post->title }}</h5>
                                                    <div style="font-size: 12px;">
                                                        <img style="border-radius: 20px;width: 20px;height: 20px;" src="{{ $post->author->avatar != null ? $post->author->avatar : '/img/cM6tLj13_400x400.jpeg' }}">
                                                        <span style="margin-left: 5px;margin-right: 10px;">{{ $post->author->name}}</span>
                                                        <span style="color: #546574;"><i class="fa fa-calendar-o"></i>&nbsp; &nbsp;{{ $post->publish_date->diffForHumans() }}</span>
                                                    </div>
                                                </div></a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="image-card-empty">
                                            <div><a href="/post/{{ $post->slug }}">
                                                @foreach($post->tags->take(3)  as $tag)
                                                    <span class="badge rounded-pill bg-info title">{{ $tag->name }}</span>
                                                @endforeach
                                                <h5>{{ $post->title }}</h5>
                                                <p>{!! Str::limit(strip_tags($post->content), 150, '...') !!}.</p>
                                                <div style="font-size: 12px;">
                                                    <img style="border-radius: 20px;width: 20px;height: 20px;" src="{{ $post->author->avatar != null ? $post->author->avatar : '/img/cM6tLj13_400x400.jpeg' }}">
                                                    <span style="margin-left: 5px;margin-right: 10px;">{{ $post->author->name}}</span>
                                                    <span style="color: #546574;"><i class="fa fa-calendar-o"></i>&nbsp; &nbsp;{{ $post->publish_date->diffForHumans() }}</span>
                                                </div></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center" style="margin-top: 50px;margin-bottom: 50px;">
                            <button class="btn btn-outline-info btn-lg text-uppercase" id="loadMore" data-page="2" data-link="/?page=" data-div="#posts" type="button" style="border-radius: 0px;">Load More</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#loadMore").click(function() {
        $div = $($(this).data('div')); //div to append
        $link = $(this).data('link'); //current URL

        $page = $(this).data('page'); //get the next page #
        $href = $link + $page; //complete URL
        $.get($href, function(response) { //append data
            $html = $(response).find("#posts").html(); 
            $div.append($html);
        });

        $(this).data('page', (parseInt($page) + 1)); //update page #
        });
    </script>
    <!-- include footer -->
    @include('footer')
    
</body>

</html>