@extends('layout.layout')

@section('title', 'Ideas | Admin')

@section('content')
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
            @include('admin.shared.sidebar')
        </div>
        <div class="col-lg-9 content-area">
            <h1> Comments </h1>
            @include('shared.success')
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                <th>ID</th>
                <th>User</th>
                <th>Idea</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>
                            <a href="{{ route('users.show', $comment->user) }}">{{ $comment->user->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('ideas.show', $comment->idea) }}">{{ $comment->idea->id }}</a>
                        </td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->created_at->toDateString() }}</td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="ms-1 btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
