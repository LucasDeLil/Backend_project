<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>
        League of Legends Shop
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('shop')}}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('why_us')}}">Why Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('contact_us')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('faq.faq') }}">FAQ</a>
        </li>
        @if(Auth::check() && Auth::user()->usertype === 'admin')
        <li class="nav-item">
          <a class="nav-link btn btn-warning" href="{{url('admin/dashboard')}}">Admin Dashboard</a>
        </li>
        @endif
      </ul>
      <div class="user_option mx-auto">
        @if (Route::has('login'))
          @auth
            <a href="{{url('mycart')}}" class="nav-link">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{$count}}]
            </a>
            <a class="nav-link" href="{{url('view_inventory')}}">Inventory</a>
            <span class="nav-link">Balance: {{ Auth::user()->balance }} gold</span>
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                
                <a class="dropdown-item" href="{{ url('about') }}">About</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </div>
            </div>
          @else
            <a href="{{url('/login')}}" class="nav-link">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>Login</span>
            </a>
            <a href="{{url('/register')}}" class="nav-link">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>Register</span>
            </a>
          @endauth
        @endif
      </div>
    </div>
  </nav>
</header>
