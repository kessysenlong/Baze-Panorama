<link href="{{ asset('css/sidenav.css') }}" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:black"> 
        <div class="row" style="width:100%">

    {{-- side navbar --}}
    <div class="col-sm">
    <ul class="navbar-nav">
            <li class="nav-item">
                
                    <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <a href="/">Home</a>
                            <a href="http://bazeuniversity.edu.ng">Baze University</a>
                            
                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Archives
                                        <i class="fas fa-caret-down"></i>
                                      </a>
                                                 
                                <div class="collapse" id="collapseExample">
                                      <div style="padding-left:10px">
                                            <a href="/posts" style="font-size:16px">All</a>
                                            <a href="#" style="font-size:16px">Baze Panorama</a>
                                            <a href="#" style="font-size:16px">Baze Focus</a>
                                            <a href="#" style="font-size:16px">Others</a>                  
                                    </div>
                                </div>
                    
                            <a href="/services">Contact Us</a>
                            <a href="https://bazeuniversity.edu.ng/news/news-all.php">News</a>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                    
                    <div class="text-white">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                    </div>
                    
                    <script src="{{ asset('js/sidenav.js') }}"></script>
            </li>
        </ul>
    </div>
    {{-- end of side navbar --}}    


    {{-- nav brand/home link --}}
    <div class="col-sm" style="text-align:center"> 
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size:20pt">
                    Baze Publications Portal
                </a>
    </div>

    {{-- end of nav brand/home link --}}
                
    {{-- right side of navbar --}}
                <div class="col-sm">
    
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link" href="http://bazeuniversity.edu.ng">Baze University</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/posts">Archives</a></li>
                      </ul> --}}
                      
                    
    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">


                            <li class="nav-item dropdown mr-sm-2 ml-sm-2">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-search"></i>
                                    </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"> 
                                        <form class="form-inline my-2 my-lg-0" action = "{{ url('/search') }}" method="POST">
                                            @csrf
                                        <input class="form-control mr-sm-2 is-valid" type="text" name="s" value="{{ isset($s) ?  $s : ''}}" placeholder="Search Journals" aria-label="Search">
                                            
                                        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit"><i class="fas fa-search"></i> Search</button>
                                            </form>
                                        </a> 
                                    
        
                                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
                                </div>
                            </li>

                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="http://library.bazeuniversity.edu.ng/"> Main Library</a>    
                            </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-sm-2 ml-sm-2">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" hidden="true" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                        @else
                            <li class="nav-item dropdown mr-sm-2 ml-sm-2">
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
        </div>


    </div>
        </nav>