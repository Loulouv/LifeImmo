<header>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Lifeimmo') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="/bailleur/request">@lang('Je suis Bailleur')</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/location/biens">@lang('Je suis Locataire')</a>
                        </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') . '?previous=' . Request::fullUrl() }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    
                    
                    @else

                        @if(auth()->user()->state == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="/conseiller/administration">@lang('Administration')</a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="/profile">@lang('Profil')</a>
                        </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                      
                      
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                      
                      
                      
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                       
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>  


    
</header>




      