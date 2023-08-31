@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" name="name"  class="form-control rounded @error('name') is-invalid @enderror()" id="name" placeholder="name" required value="{{ old('nama') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror()
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control rounded @error('username') is-invalid @enderror()" id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror()
                </div>
                <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror()" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror()
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded @error('password') is-invalid @enderror() rounded-bottom" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror()
                </div>
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already register? <a href="/login">Login now</a></small>
        </main>    
    </div>
</div>
    
@endsection