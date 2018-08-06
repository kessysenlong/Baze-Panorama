      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}" style="font-size:20pt">
                  Baze Panorama {{--{{ config('app.name', 'Baze Panorama') }}--}}
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item"> <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
                      <li class="nav-item"> <a class="nav-link" href="http://bazeuniversity.edu.ng">Baze Uni</a></li>
                      <li class="nav-item"><a class="nav-link" href="/services">Contact Us</a></li>
                      <li class="nav-item"><a class="nav-link" href="/posts">Archives</a></li>
                    </ul>
                    
                {{-- <form class="form-inline my-2 my-lg-0" action="{{ route('posts.search') }}" method="post"> --}}
                <form class="form-inline my-2 my-lg-0" action = "{{ url('/search') }}" method="POST">
                    @csrf
                <input class="form-control mr-sm-2" type="text" name="s" value="{{ isset($s) ?  $s : ''}}" placeholder="Search Journals" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                            
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/dashboard"> Dashboard</a> 
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




    