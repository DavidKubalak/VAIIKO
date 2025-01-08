<div>
    @auth
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1" required minlength="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    @endauth
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start mb-3">
            <a href="{{ route('users.show', $comment->user->id) }}" class="d-flex align-items-center text-decoration-none">
                <img style="width:35px" class="me-3 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
                     alt="{{ $comment->user->name }}">
            </a>
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.show', $comment->user->id) }}" class="text-decoration-none text-dark">
                        <h6 class="mb-1">{{ $comment->user->name }}</h6>
                    </a>
                    <span class="fs-6 fw-light text-muted">
                        <span class="fas fa-clock"> </span> {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="fs-6 mt-1 fw-light">
                    {{ $comment->content }}
                </p>
                <div class="d-flex align-items-center">
                    @auth
                        @if (auth()->user()->likedComments->contains($comment->id))
                            <form method="POST" action="{{ route('comments.unlike', $comment->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">
                                    <span class="fas fa-heart"></span>
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('comments.like', $comment->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-muted">
                                    <span class="far fa-heart"></span>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @empty
        <div>
            <p class="text-center mt-4"> No Comments Found. </p>
        </div>
    @endforelse
</div>
