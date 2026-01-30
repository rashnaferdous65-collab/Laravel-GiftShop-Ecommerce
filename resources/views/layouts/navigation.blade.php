<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">

        {{-- Logo --}}
        <a class="navbar-brand" href="{{ route('home') ?? url('/') }}">
            <span>GiftShop</span>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button"
                data-toggle="collapse"
                data-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            {{-- Main Menu --}}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('why') }}">Why Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_contact') }}">Contact Us</a>
                </li>
            </ul>

            {{-- Right Side Options --}}
            <div class="user_option d-flex align-items-center">

                {{-- Auth Section --}}
                @guest
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa fa-user"></i>
                        <span>Login</span>
                    </a>

                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fa fa-vcard"></i>
                        <span>Register</span>
                    </a>
                @endguest

                @auth
                    <a class="nav-link"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form"
                          action="{{ route('logout') }}"
                          method="POST"
                          class="d-none">
                        @csrf
                    </form>
                @endauth

                {{-- Cart --}}
                <a class="nav-link" href="#">
                    <i class="fa fa-shopping-bag"></i>
                </a>

                {{-- Search --}}
                <form class="form-inline ml-2">
                    <button class="btn nav_search-btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

            </div>
        </div>
    </nav>
</header>

