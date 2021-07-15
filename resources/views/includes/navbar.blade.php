<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{asset('assets/img/navbar-logo.svg')}}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">{{__('home.home')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('services')}}">{{__('home.services')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('portfolio')}}">{{__('home.portfolio')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">@lang('home.about')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('team')}}">@lang('home.team')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">@lang('home.contact')</a></li>
                    @auth
                    <li class="nav-item">
                        <form action = "{{url('logout')}}" method = "POST">
                            @csrf
                            <input type = "submit" value = "logout" class = "btn btn-primary">
                        </form>
                    </li>
                    <li class="nav-item">welcome, {{Auth::user()->name}}</li>

                   @endauth
                   @guest
                   <li class="nav-item"><a class="nav-link" href="{{url('register')}}">@lang('home.register')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('login')}}">@lang('home.login')</a></li>
                    @endguest

                    @if(app()->getLocale() == 'en')
                    <li class="nav-item"><a class="nav-link" href = "{{route('lang', ['lang' =>'ar'])}}">AR</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href = "{{route('lang', ['lang' =>'en'])}}">EN</a></li>
                    @endif


                </ul>
            </div>
        </div>
    </nav>
