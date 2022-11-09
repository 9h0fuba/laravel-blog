<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">WPU-BLOG-ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'fw-bold' : '' }} " href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('posts*') ? 'fw-bold' : '' }} " href="{{ route('posts.index') }}">Posts</a>
              </li>
         @can('crud-categories')
         <li class="nav-item">
          <a class="nav-link  " href="/dashboard/categories">Categories</a>
        </li> 
         @endcan
        </ul>  
        <ul class="navbar-nav ms-auto">
       
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('logout') ? 'fw-bold' : '' }}" href="{{ route('logout') }}">Logout</a>
          </li>
      
        </ul>
      </div>
    </div>
  </nav>


  {{-- <a class="nav-link  {{ request()->routeIs('home') ? 'fw-bold  ' : '' }}" href="{{ route('home') }}">Home</a>

  <a class="nav-link {{ request()->routeIs('posts') ? 'fw-bold  ' : '' }}" href="{{ route('posts') }}">Posts</a> --}}
