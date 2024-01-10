<header id="header" class="header @if(Route::currentRouteName() == 'index') fixed-top @else sticky-top @endif d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Append</h1>
        <span>.</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          {{-- <li><a href="/#hero" class="active">Home</a></li> --}}
          <li><a href="{{ route('index') }}#hero">Home</a></li>
          <li><a href="{{ route('index') }}#about">About</a></li>
          <li><a href="{{ route('index') }}#services">Services</a></li>
          <li><a href="{{ route('projects.index') }}">Portfolio</a></li>
          <li><a href="{{ route('index') }}#team">Team</a></li>
          <li><a href="{{ route('posts.index') }}">Blog</a></li>
          <li><a href="{{ route('index') }}#contact">Contact</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted" href="{{ route('index') }}#about">Get Started</a>

    </div>
  </header>