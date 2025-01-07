<div class="card mt-3 top-users">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @forelse ($topUsers as $user)
            <div class="d-flex align-items-center mb-3">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                     src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=128"
                     alt="{{ $user->name }}">
                <p class="mb-0">{{ $user->name }}</p>
            </div>
        @empty
            <p class="text-center mt-4">No active users found.</p>
        @endforelse
    </div>
</div>
