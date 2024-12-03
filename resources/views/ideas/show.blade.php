@extends('layout.layout')

@section('title', 'View Idea')

@section('contant')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            @include('shared.success')
            <div class="mt-3">
                @include('ideas.shared.idea_card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.top_users')
        </div>
    </div>
@endsection
