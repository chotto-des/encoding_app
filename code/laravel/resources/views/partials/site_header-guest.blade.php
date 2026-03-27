<nav class="navbar bg-body-tertiary shadow-sm p-2 mb-0 bg-white rounded sticky-top">
  <div class="container-fluid px-4">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <img src="{{ asset('images/PHS-Logo.png') }}" alt="Logo" width="90" height="90" class="rounded-circle">
      <div>
        <div class="fw-medium fs-3 lh-1 header_text_color">Pampanga High School</div>
        <div class="text-muted small">Excellence in Education</div>
      </div>
    </a>
    <div class="d-flex align-items-center gap-3 ms-auto">
      <a href="{{ route('register') }}" class="btn signup-btn">Sign up</a>
      @if (Route::currentRouteName() !== 'login')
        <a class="btn login-btn" href="{{ route('login') }}">Login</a>
      @endif
    </div>
  </div>
</nav>