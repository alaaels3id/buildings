<div class="header">
    <div class="container">
        <a class="navbar-brand hvr-hang" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> Store</a>
        
        <div class="menu">
            <a class="toggleMenu" href="#"><img src="{{ $root }}/one/images/nav_icon.png" alt="Home" /></a>
            <ul class="nav text-center" id="nav">
                
                {{--  Authentication Links  --}}
                @guest
                    <li class="{{ SetActive('login') }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="{{ SetActive('register') }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                
                <li class="{{ SetActive('about') }}"><a href="/about">About Us</a></li>
                <li class="{{ SetActive('services') }}"><a href="/services">Services</a></li>
                <li class="{{ SetActive('contact-us') }}"><a href="/contact-us">Contact Us</a></li>
                <li class="{{ SetActive('buildings') }}"><a href="{{ url('/buildings') }}">Buildings</a></li>

                {{-- For Rent list --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" 
                        href="#" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        For Rent <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(type() as $value)
                        @php $url1 = url('/buildings/search?bu_rent=Yes&bu_type='.$value); @endphp
                        <a style="padding: 10px;text-decoration: none;" class="dropdown-item" href="{{ $url1 }}">
                            {{ ucfirst(__($value)) }}
                        </a> 
                        @endforeach
                    </div>
                </li>

                {{-- For Buy list --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" 
                        href="#" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        For Buy <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(type() as $value)
                        @php $url = url('/buildings/search?bu_rent=No&bu_type='.$value); @endphp
                        <a style="padding: 10px;text-decoration: none;" class="dropdown-item" href="{{ $url }}"> 
                            {{ ucfirst(__($value)) }}
                        </a> 
                        @endforeach
                    </div>
                </li>

                {{-- User Profile --}}
                <li class="dropdown user user-menu nav-item">
                    <a href="#" class="dropdown-toggle hvr-hang" data-toggle="dropdown">
						<img src="{{ SetImage($auth->user_image, 'users') }}" class="img-circle" width="30" height="30" alt="User Image">
                    </a>
                    <div class="dropdown-menu" style="width: 260px;" aria-labelledby="navbarDropdown">
                    
                        <a style="padding: 10px;" href="{{ url($root.'/profile/'.$auth->username.'/edit') }}">
                            <i style="margin-right: 8px;" class="fa fa-edit fa-1x"></i>
                            {{ __('Edit Profile') }}
                        </a>
            
                
                        <a style="padding: 10px;" href="{{ url('/profile/'.$auth->username.'/active') }}">
                            <i style="margin-right: 8px;" class="fa fa-bank fa-1x"></i>
                            <b>{{ __('My Active Buildings') }}</b>
                        </a>
            
                
                        <a style="padding: 8px;" href="{{ url('/profile/'.$auth->username.'/disactive') }}">
                            <i style="margin-right: 8px;" class="fa fa-building fa-1x"></i>
                            <b>{{ __('My Disactive Buildings') }}</b>
                        </a>
            
                
                        <a style="padding: 10px;" href="{{ url('user/create/building') }}">
                            <i style="margin-right: 8px;" class="fa fa-plus fa-1x"></i>
                            <b>{{ __('Add a Building') }}</b>
                        </a>
                
                        <a style="padding: 10px;" href="{{ url($root.'/profile/'.$auth->username) }}">
                            <i style="margin-right: 8px;" class="fa fa-user fa-1x"></i>
                            <b>{{ __('Profile') }}</b>
                        </a> 

                        <a style="padding: 10px;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i style="margin-right: 8px;" class="fa fa-sign-out fa-1x"></i> 
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </li>
                @endguest
                <div class="clearfix"></div>
            </ul>
        </div>
    </div>
</div>