<nav class="navbar navbar-expand-lg">
    <div class="container ">
      <a class="navbar-brand" href="#">Blog'est</a>
      <button class="navbar-toggler" type="button" onclick="myFunction()" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse topnav " id="navbarNav">
        
        <ul class="navbar-nav ">
          <li class="nav-item me-3">
            <a class="nav-link  {{ request()->routeIs('home') ? 'fw-bold  ' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link  {{ request()->routeIs('posts') ? 'fw-bold  ' : '' }}" href="{{ route('posts') }}">Posts</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('about') ? 'fw-bold'  : ''}}" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('categories*') ? 'fw-bold' : '' }}" href="{{ route('categories') }}">Categories</a>
          </li>
          @auth
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'fw-bold' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          @endauth
          <li class="nav-item me-3 dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              @guest
              <li>
                <a class="dropdown-item{{ request()->routeIs('login') ? 'fw-bold' : '' }}" href="{{ route('login') }}">Login</a>
              </li>
              <li>
                <a class="dropdown-item{{ request()->routeIs('register') ? 'fw-bold' : '' }}" href="{{ route('register') }}">Register</a>
              </li>
              @endguest
             
              @auth
              <li>
                <a class="dropdown-item{{ request()->routeIs('logout') ? 'fw-bold' : '' }}" href="{{ route('logout') }}">Logout</a>
              </li>
              @endauth
            </ul>
          </li>
        </ul>
       
        <ul class="navbar-nav ms-auto" >
         
        </ul>
       
      </div>
    </div>
  </nav>
  <div style="width:80%%; height: 0.1rem; " class="bg-dark"></div>


  


