<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <span>GiftShop</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('add_shop')}}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('why')}}">Why Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('testimonial')}}">Testimonial</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('add_contact')}}">Contact Us</a></li>
            </ul>

            <div class="user_option">

                
                @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user"></i>
                        <span>Login</span>
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="fa fa-vcard"></i>
                        <span>Register</span>
                    </a>
                @else
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
               


                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                </a>

                <form class="form-inline">
                    <button class="btn nav_search-btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

            </div>

        </div>
    </nav>
</header>

