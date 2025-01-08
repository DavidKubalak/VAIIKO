@extends('layout.layout')

@section('title', 'Users | Admin')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.sidebar')
        </div>
        <div class="col-9">
            <h1> Users </h1>
            @include('shared.success')
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joinet At</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->toDateString() }}</td>
                        <td>
                            <a class="ms-1 btn btn-success btn-sm view-user" data-id="{{ $user->id }}">View</a>
                        </td>
                        <td>
                            <a class="ms-1 btn btn-warning btn-sm edit-user" data-id="{{ $user->id }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('delete')
                                {{-- <a href="#" onclick="this.closest('form').submit();return false;">Delete</a> --}}
                                <button class="ms-1 btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links() }}
            </div>
            <div id="user-details" style="display: none;">
                @include('admin.users.show')
            </div>
            <div id="edit-user-details" style="display: none;">
                @include('admin.users.edit')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.view-user').on('click', function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                $.ajax({
                    url: '/admin/users/' + userId,
                    method: 'GET',
                    success: function(response) {
                        $('#user-image').attr('src', response.user.image_url);
                        $('#user-name').text(response.user.name);
                        $('#user-email').text(response.user.email);
                        $('#user-bio').text(response.user.bio);
                        $('#user-details').show();
                        $('#edit-user-details').hide();
                    }
                });
            });

            $('.edit-user').on('click', function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                $.ajax({
                    url: '/admin/users/' + userId + '/edit',
                    method: 'GET',
                    success: function(response) {
                        $('#edit-user-image').attr('src', response.user.image_url);
                        $('#edit-user-name').val(response.user.name);
                        $('#edit-user-email').val(response.user.email);
                        $('#edit-user-bio').val(response.user.bio);
                        $('#edit-user-form').attr('action', '/admin/users/' + userId);
                        $('#edit-user-details').show();
                        $('#user-details').hide();
                    }
                });
            });
        });
    </script>

@endsection
