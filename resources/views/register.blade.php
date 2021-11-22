@extends('master')

@section('content')
    <div
        style="background-image: url('{{ asset('imgs/login.jpg') }}'); background-size: cover; position: relative"
        class="h-100">
        <div style="position: absolute;background-color: black;height: 100%;width: 100%;opacity: 50%"></div>
        <div class="card shadow-sm"
             style="width: 500px; top: 50%;left: 50%;  transform: translate(-50%, -50%);position: absolute">
            <div class="card-header">
                <h3 class="mb-0">Register</h3>
            </div>
            <div class="card-body">
                <!-- Task 2 Guest, step 5: add the HTTP method and url as instructed-->
                <form method="POST" action="{{route('doRegister')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control name" id="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <div class="form-text text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control email" id="email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="form-text text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control password" id="password" value="{{ old('password') }}">
                        @if($errors->has('password'))
                            <div class="form-text text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" name="password-confirmation" class="form-control password-confirmation" id="password-confirmation" value="{{ old('password confirmation') }}">
                        @if($errors->has('password confirmation'))
                            <div class="form-text text-danger">{{ $errors->first('password confirmation') }}</div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="register-submit">{{__('Register')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
