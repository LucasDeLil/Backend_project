<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand" href="index.html">
      <span>
        League of Legends Shop
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('shop')}}">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('why_us')}}">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profile.edit')}}">
            profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('testimonial')}}">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('contact_us')}}">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">

        @if (Route::has('login'))

          @auth

          <a href="{{url('mycart')}}">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            [{{$count}}]
          </a>
          

          <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
            @csrf

            <input class="btn btn-success" type="submit" value="logout">
          </form>
          @else

          <a href="{{url('/login')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>
          <a href="{{url('/register')}}">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>
              Register
            </span>
          </a>

          @endif
          @endauth

          <form class="form-inline ">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
      </div>
    </div>
  </nav>
</header>