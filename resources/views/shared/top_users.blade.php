<div class="card top-users">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @forelse ($topUsers as $user)
            <div class="d-flex align-items-center mb-3">
                <a href="{{ route('users.show', $user->id) }}" class="d-flex align-items-center text-decoration-none">
                    <img style="width:35px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                         alt="{{ $user->name }}">
                    <p class="mb-0 text-dark">{{ $user->name }}</p>
                </a>
            </div>
        @empty
            <p class="text-center mt-4">No active users found.</p>
        @endforelse
    </div>
</div>
