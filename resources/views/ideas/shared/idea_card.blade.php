<div class="card" id="idea-{{ $idea->id }}">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name={{ $idea->user->name }}&background=random&size=128"
                     alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="mb-0 username-main">
                        <a href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name }}</a>
                    </h5>
                </div>
            </div>
            <div class="d-flex">
                <a class="ms-1 btn btn-view btn-sm" href="{{ route('ideas.show', $idea->id) }}"> View </a>
                @auth
                    @if($idea->canUpdate())
                        <a class="ms-1 btn btn-edit btn-sm" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                    @endif
                    @if($idea->canDelete())
                        <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}" class="delete-form" data-id="{{ $idea->id }}">
                            @csrf
                            @method('delete')
                            <button class="ms-1 btn btn-delete btn-sm">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($edit ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-3 btn-sm "> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"> </span> {{ $idea->created_at->diffForHumans() }}
                </span>
            </div>
            <div>
                @auth
                    @if (auth()->user()->likedIdeas->contains($idea->id))
                        <form method="POST" action="{{ route('ideas.unlike', $idea->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">
                                <span class="fas fa-heart"></span>
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('ideas.like', $idea->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-muted">
                                <span class="far fa-heart"></span>
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
        @include('ideas.shared.comments_box')
    </div>
</div>
