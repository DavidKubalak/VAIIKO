@extends('layout.layout')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            @include('shared.success')
            <div class="mt-3">
                @include('users.shared.user_card')
            </div>
            <hr>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea_card')
                </div>
            @empty
                <p class="text-center my-4">No Results Found.</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block">
            @include('shared.top_users', ['topUsers' => $topUsers])
        </div>
    </div>
@endsection
