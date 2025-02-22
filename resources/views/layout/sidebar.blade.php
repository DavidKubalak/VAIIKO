<div class="card sidebar overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="view-profile">
        <a class="view_profile_btn" href="{{ route('profile') }}">View Profile</a>
    </div>
</div>
