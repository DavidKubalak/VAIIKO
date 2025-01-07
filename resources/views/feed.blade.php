@extends('layout.layout')

@section('title', 'Feed')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6 content-area">
            @auth
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas.shared.idea_card')
                    </div>
                @empty
                    <p class="text-center my-4">No Results Found. Follow someone to see their posts!</p>
                @endforelse
                <div class="mt-3">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            @else
                <p class="text-center my-4">You must be logged in to see the feed. <a href="{{ route('login') }}">Log in</a> or <a href="{{ route('register') }}">register</a> to get started!</p>
            @endauth
        </div>
        <div class="col-3">
            @include('shared.top_users', ['topUsers' => $topUsers])
        </div>
    </div>
@endsection
