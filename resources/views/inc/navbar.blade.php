<div id="topHeader">
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">LSAPP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav mr-auto" id="myNav">
              <li class="nav-item <?php if($page =='Home') {echo 'active';}?>">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?php if($page =='About') {echo 'active';}?>">
                <a class="nav-link" href="{{url('about')}}">About</a>
              </li>
              <li class="nav-item <?php if($page =='Services') {echo 'active';}?>">
              <a class="nav-link" href="{{url('services')}}">Services</a>
              </li>
              <li class="nav-item <?php if($page =='Posts') {echo 'active';}?>">
                  <a class="nav-link" href="{{url('posts')}}">Blog</a>
              </li>
              
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{-- Dashboard --}}
                <li class="nav-item <?php if($page =='Dashboard') {echo 'active';}?>">
                    <a class="nav-link" href="{{url('home')}}">Dashboard</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item <?php if($page =='Login') {echo 'active';}?>">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item <?php if($page =='Register') {echo 'active';}?>">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
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
            <form action="/search_post" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
</div>
