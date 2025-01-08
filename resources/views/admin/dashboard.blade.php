@extends('layout.layout')

@section('title', 'Admin')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.sidebar')
        </div>
        <div class="col-9">
            <h1> Admin Dashboard </h1>
            <div class="row mt-4">
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Ideas',
                        'icon' => 'fa-solid fa-lightbulb',
                        'data' => $totalIdeas,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Comments',
                        'icon' => 'fa-solid fa-comment',
                        'data' => $totalComments,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
