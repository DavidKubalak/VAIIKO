<div class="card" id="idea-{{ $idea->id }}">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                     alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a
                            href="#">{{ $idea->user->name }}</a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a class="ms-1 btn btn-success btn-sm" href="{{ route('ideas.show', $idea->id) }}"> View </a>
                @auth
                    @if($idea->canUpdate())
                        <a class="ms-1 btn btn-warning btn-sm" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                    @endif
                    @if($idea->canDelete())
                        <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}" class="delete-form" data-id="{{ $idea->id }}">
                            @csrf
                            @method('delete')
                            <button class="ms-1 btn btn-danger btn-sm">Delete</button>
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
        <div class="d-flex justify-content-between">
{{--            @include('ideas.shared.like_button')--}}
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comments_box')
    </div>
</div>
