<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="#">
                    <span>Home</span></a>
{{--                href="{{ route('dashboard') }}--}}
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="#">
                    <span>Feed</span></a>
{{--                href="{{ route('feed') }}--}}
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}  nav-link"
                   href="#">
                    <span>Terms</span></a>
{{--                href="{{ route('terms') }}--}}
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="{{ Route::is('profile') ? 'text-white bg-primary rounded' : '' }} btn btn-link"
           href="#">View Profile </a>
{{--        href="{{ route('profile') }}--}}
    </div>
</div>
