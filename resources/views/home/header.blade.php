<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span style="font-size:40px; font-weight:bold;">GiftShop</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Navigation Links --}}
            <ul class="navbar-nav">
                @php
                    $navLinks = [
                        ['url' => url('/'), 'label' => 'Home'],
                        ['url' => url('add_shop'), 'label' => 'Shop'],
                        ['url' => url('why'), 'label' => 'Why Us'],
                        ['url' => url('testimonial'), 'label' => 'Testimonial'],
                        ['url' => url('add_contact'), 'label' => 'Contact Us'],
                    ];
                @endphp

                @foreach ($navLinks as $link)
                    <li class="nav-item {{ request()->url() == $link['url'] ? 'active' : '' }}">
                        <a class="nav-link" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>

            {{-- User Options --}}
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
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>

                    <a href="{{ url('my_cart') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        ({{ $count }})
                    </a>

                    <a href="{{ url('my_order') }}">My Order</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</header>
