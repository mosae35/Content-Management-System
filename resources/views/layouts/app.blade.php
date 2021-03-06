<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    @yield('styles')

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            @if(auth()->check())
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <ul class=" list-unstyled list-group-item">
                        <li> <a href="{{url('home')}}"> <h4> Home </h4> </a></li><hr>
                        <li> <a href="{{url('user')}}"> <h4> Users </h4> </a></li><hr>
                        <li> <a href="{{url('profile')}}"> <h4> My Profile </h4> </a></li><hr>
                        <li> <a href="{{url('profile/'.\Auth::id().'/edit')}}"> <h4>Edit My Profile </h4> </a></li><hr>
                        <li> <a href="{{url('category')}}"> <h4> Categories </h4> </a></li><hr>
                        <li> <a href="{{url('posts')}}"> <h4> All Posts </h4> </a></li><hr>
                        <li> <a href="{{url('tags')}}"> <h4> Tags </h4> </a></li><hr>
                        <li> <a href="{{url('post/trashed')}}"> <h4> All Posts Trashed </h4> </a></li><hr>
                        <li> <a href="{{url('category/create')}}"> <h4> Create Category </h4> </a></li><hr>
                        <li> <a href="{{url('tags/create')}}"> <h4> Create Tag </h4> </a></li><hr>
                        <li> <a href="{{url('posts/create')}}"> <h4>Create Post</h4> </a></li><hr>
                        <li> <a href="{{url('settings')}}"> <h4> Settings </h4> </a></li>
                    </ul>
                </div>
            </div>
            @endif
            @if(count($errors)>0)
                    <div class="col-lg-8">
                        <div class="panel panel-default alert-danger">
                            <ul class=" list-unstyled list-group">
                                @foreach($errors->all() as $error)
                                <li> <h4 class="text-center"> {{$error}} </h4> </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            <div class="col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>



</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
    @endif
     @if(Session::has('info'))
        toastr.info('{{Session::get('info')}}');
    @endif

</script>

@yield('scripts')
</body>
</html>
