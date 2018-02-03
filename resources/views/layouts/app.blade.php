<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobr') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jobr.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <a class="brand" href="{{ url('/') }}"><img src="{{ asset("images/brand.svg") }}" /> {{ config('app.name', 'Jobr') }}</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-uppercase blue">
                        <li><a href="{{ route('home') }}"><i class="fa fa-fw fa-list" aria-hidden="true"></i> Delovna mesta</a></li>
                        <li><a href="{{ route('companies') }}"><i class="fa fa-building-o  fa-fw"></i> Podjetja</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right text-uppercase">
                        <!-- Authentication Links -->
                        @if ( !Auth::guard('web')->check() && !Auth::guard('company')->check())
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-fw fa-sign-in"></i> Prijava
                                  <!-- elseif guard = admin -->
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                      <a href="{{ route('login.user')}}">
                                        <i class="fa fa-bar-chart fa-fw"></i> Iskalec zaposlitve
                                      </a>
                                    </li>

                                    <li>
                                      <a href="{{ route('login.company')}}">
                                        <i class="fa fa-pencil-square-o fa-fw"></i> Podjetje
                                      </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-fw fa-user-plus"></i> Registracija
                                  <!-- elseif guard = admin -->
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                      <a href="{{ route('register.user')}}">
                                        <i class="fa fa-bar-chart fa-fw"></i> Iskalec zaposlitve
                                      </a>
                                    </li>

                                    <li>
                                      <a href="{{ route('register.company')}}">
                                        <i class="fa fa-pencil-square-o fa-fw"></i> Podjetje
                                      </a>
                                    </li>

                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                  @if(Auth::guard('company')->check())
                                    {{Auth::guard('company')->user()->name}}
                                  @elseif(Auth::guard('web')->check())
                                  <i class="fa fa-user fa-fw"></i> {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                  @endif
                                  <!-- elseif guard = admin -->
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                  @if(Auth::guard('company')->check())
                                    <li>
                                      <a href="{{ route('company.dashboard')}}">
                                        <i class="fa fa-bar-chart fa-fw"></i> Nadzorna plošča
                                      </a>
                                    </li>
                                  @else
                                    <li>
                                      <a href="{{ route('applies')}}">
                                        <i class="fa fa-pencil-square-o fa-fw"></i> Prijave
                                      </a>
                                    </li>
                                  @endif
                                  <li>
                                    <a href="{{ route('profile')}}">
                                      <i class="fa fa-address-card-o fa-fw"></i> Profil
                                    </a>
                                  </li>
                                  <li>
                                    <a href="{{ route('messages')}}">
                                      <i class="fa fa-envelope-o fa-fw"></i> Sporočila
                                      @if(Auth::guard('company')->check())
                                        @if(sizeof(Auth::guard('company')->user()->unreadMessages()) > 0)
                                      <span class="message-count">
                                              {{sizeof(Auth::guard('company')->user()->unreadMessages())}}  
                                            </span>
                                        @endif
                                      @else
                                        @if(sizeof(Auth::guard('web')->user()->unreadMessages()) > 0)
                                      <span class="message-count">
                                          {{sizeof(Auth::guard('web')->user()->unreadMessages())}}
                                            </span>
                                        @endif
                                      @endif

                                    </a>
                                  </li>
                                  @if(Auth::guard('web')->check())
                                  <li>
                                    <a href="{{ route('subscriptions')}}">
                                      <i class="fa fa-newspaper-o fa-fw"></i> Naročnine
                                    </a>
                                  </li>
                                  @endif


                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   <i class="fa fa-sign-out fa-fw"></i> Odjava
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

        @yield('content')


    </div>

    <footer>
            <div class="container footer-container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 footer-col">
                        <div class="logofooter"> JOBR inc.</div>
                        <p><i class="fa fa-map-pin"></i> Večna pot 113, 1000 Ljubljana</p>
                        <p><i class="fa fa-phone"></i> IT oddelek: +386 1 111 11 11 <br /><i class="fa fa-phone"></i> Svetovanje: +386 1 222 22 22 <br /><i class="fa fa-phone"></i> Informacije: +386 1 333 33 33</p>
                        <p><i class="fa fa-envelope"></i> IT oddelek: info@jobr.si <br /><i class="fa fa-envelope"></i> Svetovanje: svet@jobr.si <br /><i class="fa fa-envelope"></i> Informacije: info@jobr.si</p>
                    </div>
                    <div class="col-md-3  col-sm-4 footer-col">
                        <h6 class="heading7">POVEZAVE</h6>
                        <ul class="footer-ul">
                            <li><a href="{{route('home')}}"> Delovna mesta</a></li>
                            <li><a href="{{route('companies')}}"> Podjetja</a></li>
                            <li><a href="{{route('login.user')}}"> Prijava</a></li>
                            <li><a href="{{route('register.user')}}"> Nov uporabnik</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-4 footer-col">
                        <h6 class="heading7">DRUŽABNA OMREŽJA</h6>
                        <p>
                            <ul class="footer-social">
                                <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
                                <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
                                <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
                                <li><i class="fa fa-youtube-play social-icon youtube" aria-hidden="true"></i></li>
                                <li><i class="fa fa-instagram social-icon instagram" aria-hidden="true"></i></li>
                            </ul>
                            <br /><br />&nbsp;
                        </p>
                    </div>

                    <div class="col-md-3 col-sm-4 footer-col">
                    <h6 class="heading7">VEČ...</h6>
                        <p>
                        JOBR © 2018, Vse pravice pridržane<br><br>
                        Izdelava spletne strani: TPO Team
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jobr.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>
