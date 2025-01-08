@extends('layout.layout')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login') }}" method="post" novalidate>
                @csrf
                <h3 class="text-center text-dark">Login</h3>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                    @error('email')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control" required minlength="8">
                    @error('password')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Submit">
                </div>
                <div class="text-right mt-2">
                    <a href="{{ route('register') }}" class="text-dark">Register here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
