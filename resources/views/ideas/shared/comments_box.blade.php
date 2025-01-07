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
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=random&size=128"
                 alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1">{{ $comment->user->name }}</h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
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
