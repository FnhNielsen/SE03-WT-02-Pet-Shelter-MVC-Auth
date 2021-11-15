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
                <form method="POST" action="#">
                    @csrf
                    <!-- Task 2 Guest, step 3: add register fields as instructed-->
                    <!-- Tip: we add the element name for you as an inspiration on how you can add the rest of the inputs -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control name" id="name" value="{{ old('name') }}">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control name" id="email" value="{{ old('email') }}">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control name" id="password" value="{{ old('password') }}">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" name="password-confirmation" class="form-control name" id="password-confirmation" value="{{ old('password') }}">
                        @if($errors->has('name'))
                            <div class="form-text text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <!-- end of Tip -->

                    <div class="d-flex justify-content-between align-items-center">
                        <button href="{{route("home")}}" class="register-submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
