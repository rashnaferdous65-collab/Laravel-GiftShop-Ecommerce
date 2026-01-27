<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{ url('/') }}">
        <span style="font-size:40px; font-weight:bold;">
          GiftShop
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('add_shop')}}">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('why')}}">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('testimonial')}}">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('add_contact')}}">Contact Us</a>
          </li>
        </ul>
        
       <div class="user_option">

    {{-- *Dynamic Login/Register/Logout Start Here* --}}
    @guest
       
        <a href="{{ route('login') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Login</span>
        </a>

        <a href="{{ route('register') }}">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>Register</span>
        </a>
    @else
       
        <a href="{{ route('dashboard') }}">
             <i class="fa fa-user" aria-hidden="true"></i>
             <span>Profile</span>
        </a>
        
     
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
        </a>

        <a href="{{url('my_cart')}}">

   <i class="fa-solid fa-cart-shopping"></i>
   ({{$count}})   </a>

     <a href="{{url('my_order')}}">
      My Order
     </a>

        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endguest
    {{-- Dynamic Login/Register/Logout End Here* --}}

   
    
   
</div>

      </div>
    </nav>
</header>