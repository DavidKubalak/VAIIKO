<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="d-flex align-items-center mb-3">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
                <p class="mb-0">{{ $user->name }}</p>
            </div>
        @endforeach
    </div>
</div>
