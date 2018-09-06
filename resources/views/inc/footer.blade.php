<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" target="_blank" href="{{ GetSettings('facebook') }}"></a>
            <a class="fa fa-twitter social-icon" target="_blank" href="{{ GetSettings('twitter') }}"></a>
            <a class="fa fa-linkedin social-icon" target="_blank" href="{{ GetSettings('linkedin') }}"></a>
            <a class="fa fa-google-plus social-icon" target="_blank" href="{{ GetSettings('google') }}"></a>
            <a class="fa fa-youtube social-icon" target="_blank" href="{{ GetSettings('youtube') }}"></a>
        </div>

        <div class="text-center">
            <ul class="unstyled-list list-inline">
                <li><a style="color:#fff;" href="/about">About Us</a></li>
                <li><a style="color:#fff;" href="/services">Services</a></li>
                <li><a style="color:#fff;" href="/contact-us">Contact Us</a></li>
                <li><a style="color:#fff;" href="{{ url('/buildings') }}">Buildings</a></li>

                <li class="nav-item dropdown">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(type() as $value)
                        <a style="padding: 10px;" class="dropdown-item" href="{{ url('/buildings/search?bu_rent=Yes&bu_type='.$value) }}"> 
                            {{ ucfirst(__($value)) }}
                        </a> 
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="copy">
            <p>
                Copyright &copy; {{ date('Y') }} Company Name. Design by 
                <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a>
            </p>
        </div>
    </div>
</div>