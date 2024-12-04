@extends('layout.layout')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
            @include('layout.sidebar')
        </div>

        <div class="col-lg-6 content-area">
            @include('shared.success')
            @include('ideas.shared.submit_idea')
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
            @include('shared.top_users')
        </div>
    </div>
@endsection
