<div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
      <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy"
        style="margin-top: -3px;" />
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts') }}" rel="nofollow">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
      </ul>

      Bem vindo
      @if (auth()->guest())
      Visitante
      @else
        {{ auth()->user()->fullName }} | <a href="{{ route('logout') }}">Logout</a>
      @endif
    </div>
  </div>