<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EduDaily:: {{ $post->title }}</title>
    <meta name="theme-color" content="#55aaff">
    <meta name="twitter:card" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$post->title}}" />
    @if ($post->meta != null && $post->meta['opengraph_description'] != null)
        <meta property="og:description" content="{{$post->meta['opengraph_description']}}" />
    @else
        <meta property="og:description" content="EduDaily is an educational portal for all tertiary institution related news in Nigeria." />
    @endif

    @if($post->meta != null && $post->meta['opengraph_image']  != null)
        <meta property="og:image" content="{{ $post->meta['opengraph_image'] }}" />
    @endif
    @if ($post->meta != null && $post->meta['meta_description'] != null)
        <meta name="description" content="{{$post->meta['meta_description']}}">
    @else
        <meta name="description" content="EduDaily is an educational portal for all tertiary institution related news in Nigeria. ">
    @endif
    <!-- include navigation -->
    @include('head')
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid body-c">
        <!-- include navigation -->
        @include('navigation')

        <div style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)) , url(&quot;{{ $post->featured_image }}&quot;) center center / cover no-repeat;opacity: 1;transform: perspective(0px);height: 500px;"></div>
        <div class="row blog-b">
            <div class="col">
                <h3 style="font-weight: bold;">{{ $post->title }}</h3>
                <p style="padding-bottom: 30px;">
                    @foreach($post->tags as $tag)
                        <span class="badge rounded-pill bg-info title">{{ $tag->name }}</span>
                    @endforeach
                </p>
                <div>{!! $post->content !!}</div>
                <div class="row" style="border-top: solid var(--bs-gray-400) 1px; padding-top: 15px;">
                    <div class="col align-self-center">
                        <img src="{{ $post->author->avatar}}" style="border-radius: 50px;width: 50px;margin-right: 20px;" />
                        <span class="text-break text-start">{{ $post->author->name }}u</span></div>
                    <div class="col align-self-center">
                        <span style="float: right;color: var(--bs-gray-800);font-style: italic;font-size: 12px;">{{ $post->publish_date->diffForHumans() }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- include footer -->
    @include('footer')
    
</body>

</html>