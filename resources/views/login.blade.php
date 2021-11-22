@extends('master')

@section('content')
    <div
        style="background-image: url('{{ asset('imgs/login.jpg') }}'); background-size: cover; position: relative"
        class="h-100">
        <div style="position: absolute;background-color: black;height: 100%;width: 100%;opacity: 50%"></div>
        <div class="card shadow-sm"
             style="width: 500px; top: 50%;left: 50%;  transform: translate(-50%, -50%);position: absolute">
            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('doLogin')}}">
                @csrf
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control email" id="email" value="{{ old('email') }}">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control password" id="password">

                    <button type="submit" class="login-submit">Register</button>
                    <div class="d-flex justify-content-between align-items-center">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
