@extends('app.layout_app.layout')

@section('content')

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{asset($post->image)}}" alt="seo">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">Admin</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="#">{{$post->category->name}}</a>
                            </span>

                            </div>

                            <div class="post__content-info">

                                {!! $post->content !!}

                            </div>
                        </div>

                        <div class="socials">Share:
                            <a href="#" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{asset('app/img/blog-details-author.png')}}" alt="Author">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">Philip Demarco</h5>
                                <p class="author-info">SEO Specialist</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod.
                            </p>
                            <div class="socials">

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/google.svg')}}" alt="google">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">

                        @if($next_post)
                        <a href="{{url('post/info/'.$next_post->slug)}}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">{{$next_post->title}}</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                        @endif

                            @if($prev_post)
                        <a href="{{url('post/info/'.$prev_post->slug)}}" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{$prev_post->title}}</p>
                            </div>
                        </a>
                            @endif

                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>


                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                             var disqus_config = function () {
                             this.page.url = "{{url('post/info/'.$post->slug)}}";  // Replace PAGE_URL with your page's canonical URL variable
                             this.page.identifier = "post{{$post->slug}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                             };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://laravel-blog-am2ddcjzax.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>





                    </div>

                    <div class="row">

                    </div>


                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @foreach($post->tags as $tag)
                                <a href="{{url('single/tag/'.$tag->id)}}" class="w-tags-item">{{$tag->tag}}</a>
                                    @endforeach
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

    @endsection