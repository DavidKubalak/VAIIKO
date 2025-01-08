<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-logo-text" href="{{ route('dashboard') }} "><span class="fas fa-brain me-1">
            </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item me-2">
                        <a class="{{ Route::is('login') ? 'active' : '' }} custom-nav-link" aria-current="page"
                           href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="{{ Route::is('register') ? 'active' : '' }} custom-nav-link"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth()
                    @if (Auth::user()->is_admin)
                        <li class="nav-item me-2">
                            <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }} custom-nav-link"
                               href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>
                    @endif
                    <li class="nav-item me-2">
                        <a class="{{ Route::is('profile') ? 'active' : '' }} me-2 custom-nav-link"
                           href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
                <li class="nav-item d-lg-none mt-2">
                    <a class="sidebar-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item d-lg-none mt-2">
                    <a class="sidebar-link {{ Route::is('feed') ? 'active' : '' }}" href="{{ route('feed') }}">Feed</a>
                </li>
                <li class="nav-item d-lg-none mt-2 mb-2">
                    <a class="sidebar-link {{ Route::is('terms') ? 'active' : '' }}" href="{{ route('terms') }}">Terms</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
