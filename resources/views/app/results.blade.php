@extends('app.layout_app.layout')

@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Results: {{$request}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">
                        @if(count($results)  != 0)
                        @foreach($results as  $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{asset($post->image)}}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{url('post/info/'.$post->slug)}}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                        @endforeach
                            @else
                            <h3 class="text-center"> No Results Founded  </h3>
                        @endif
                    </div>

                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
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
                                    @foreach($tags as $tag)
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