<style>
    .logo {
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1;
}
</style>

{{-- Light Navbar --}}
{{-- <nav class="navbar navbar-expand-lg navbar-light bg-white" style="box-shadow: 0px 2px 2px 2px #888888; margin-bottom:20px">  --}}

{{-- Dark Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0px 2px 2px 2px #888888; margin-bottom:20px"> 

    <div class="row" style="width:100%">
    {{-- Left Nav --}}
        <div class="col-sm-1">
                <a href="/" class="logo" style="z-index:1;position:absolute;"><img src="/storage/bg_images/logo.png" alt="baze logo"></a>
        </div>
        
        <div class="col-sm-3">
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
                                    <a class="nav-link" href="/application">APPLY</a>    
                                </li>
            

                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="http://library.bazeuniversity.edu.ng/">MAIN LIBRARY</a>    
                            </li>

                            <li class="nav-item mr-sm-2 ml-sm-2">
                                <a class="nav-link" href="/contact">CONTACT US</a>    
                            </li>

                        
                                <li class="nav-item dropdown mr-sm-2 ml-sm-2">
                                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fas fa-search"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <div class="dropdown-item"> 
                                                    
                                                        <form class="form-inline" action = "{{ url('/search') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                            <input class="form-control" type="text" name="s" value="{{ isset($s) ?  $s : ''}}" placeholder="Search posts" aria-label="Search" required>
                                                            </div>
                                                            <div class="form-group">
                                                            <button class="btn success float-right" type="submit">Search</button>
                                                            </div>
                                                        </form>
                                                    </div> 
                                        </div>
                                    </li>

                            
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