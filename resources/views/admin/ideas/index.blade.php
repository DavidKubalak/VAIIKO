@extends('layout.layout')

@section('title', 'Ideas | Admin')

@section('content')
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
            @include('admin.shared.sidebar')
        </div>
        <div class="col-lg-9 content-area">
            <h1> Ideas </h1>
            @include('shared.success')
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                <th>User</th>
                <th>Content</th>
                <th>Created At</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach ($ideas as $idea)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $idea->user) }}">{{ $idea->user->name }}</a>
                        </td>
                        <td>{{ $idea->content }}</td>
                        <td>{{ $idea->created_at->toDateString() }}</td>
                        <td>
                            <a class="ms-1 btn btn-success btn-sm view-idea" data-id="{{ $idea->id }}">View</a>
                        </td>
                        <td>
                            <a class="ms-1 btn btn-warning btn-sm edit-idea" data-id="{{ $idea->id }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.ideas.destroy', $idea) }}" method="POST">
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
                {{ $ideas->links() }}
            </div>
            <div id="idea-details" style="display: none;">
                @include('admin.ideas.show')
            </div>
            <div id="edit-idea" style="display: none;">
                @include('admin.ideas.edit')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.view-idea').on('click', function(e) {
                e.preventDefault();
                var ideaID = $(this).data('id');
                $.ajax({
                    url: '/admin/ideas/' + ideaID,
                    method: 'GET',
                    success: function(response) {
                        var createdAt = moment(response.idea.created_at);
                        $('#idea-user-image').attr('src', response.idea.image_url);
                        $('#idea-user-name').text(response.idea.name);
                        $('#idea-content').text(response.idea.content);
                        $('#idea-created_at').text(createdAt.fromNow());
                        $('#idea-details').show();
                        $('#edit-idea').hide();
                    }
                });
            });

            $('.edit-idea').on('click', function(e) {
                e.preventDefault();
                var ideaID = $(this).data('id');
                $.ajax({
                    url: '/admin/ideas/' + ideaID + 'edit',
                    method: 'GET',
                    success: function(response) {
                        var createdAt = moment(response.idea.created_at);
                        $('#edit-idea-user-image').attr('src', response.idea.image_url);
                        $('#edit-idea-user-name').text(response.idea.name);
                        $('#edit-idea-content').val(response.idea.content);
                        $('#edit-idea-created_at').text(createdAt.fromNow());
                        $('#edit-idea-form').attr('action', '/admin/ideas/' + ideaID);
                        $('#edit-idea').show();
                        $('#idea-details').hide();
                    }
                });
            });
        });
    </script>

@endsection
