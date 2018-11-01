<style>
    .logo {
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1;
}

.downdrop {
    position: relative;
    display: inline-block;
}

.downdrop-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.downdrop:hover .downdrop-content {
    display: block;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
    <div class="row" style="width:100%">
        {{-- Left Nav --}}
        {{--  mr-auto text-left --}}
        <div class="col-sm-4">
            <a href="/" class="logo" style="z-index:1;position:absolute;"><img src="/storage/bg_images/logo.png" alt="baze logo"></a>
            <a class="navbar-brand float-right" href="{{ url('/') }}" style="font-size:22pt; padding-right:25px; font-family: 'UnifrakturMaguntia', cursive;">
                Baze Publications Portal
            </a>
        </div>
    
                
    {{-- Right Nav --}}
        <div class="col-sm ml-auto text-right">
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ml-auto" style="font-size:16px">


                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="/posts">ARCHIVE</a>    
                            </li>
            

                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="http://library.bazeuniversity.edu.ng/">MAIN LIBRARY</a>    
                            </li>

                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="/services">CONTACT US</a>    
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item"> 
                                        <form class="form-inline" action = "{{ url('/search') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                            <input class="form-control is-valid" type="text" name="s" value="{{ isset($s) ?  $s : ''}}" placeholder="Search posts" aria-label="Search" required>
                                            <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Search</button>
                                        </div>
                                        </form>
                                    </div> 
                                </div>

                                {{-- <div class="downdrop" aria-expanded="false">
                                        <span class="nav-link">
                                                <i class="fas fa-search"></i>
                                        </span>
                                        <div class="downdrop-content">
                                                <form class="form-inline" action = "{{ url('/search') }}" method="POST">
                                                    @csrf
                                                    
                                                    <input class="form-control is-valid" type="text" name="s" value="{{ isset($s) ?  $s : ''}}" placeholder="Search posts" aria-label="Search" required>
                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                                </form>
                                        </div>
                                      </div>
                            </li> --}}

                            
                

                            
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-sm-2 ml-sm-2">
                                    <a class="nav-link" href="{{ route('login') }}" style="text-transform:uppercase"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="register" hidden="true" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                        @else
                            <li class="nav-item dropdown mr-sm-2 ml-sm-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                              
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/dash/custom"><i class="fas fa-tachometer-alt"></i>   Dashboard</a> 
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>   {{ __('Logout') }}  
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
 </nav>