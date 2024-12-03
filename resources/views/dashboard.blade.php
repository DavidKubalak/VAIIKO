@extends('layout.layout')

@section('title', 'Home')

@section('contant')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
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
        <div class="col-3">
            @include('shared.top_users')
        </div>
    </div>
@endsection
