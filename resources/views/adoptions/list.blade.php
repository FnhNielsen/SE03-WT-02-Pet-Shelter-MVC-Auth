@extends('master')

@section('content')
    <div class="container mt-4">
        <h2>{{ $header }}</h2>
        @include('partials.success-alert')
        <div class="row">
            @forelse($adoptions as $adoption)
                <div class="col-4 pet">
                    <ul class="pet">
                        <li class="pet-name"></li>
                        <li class="pet-description"></li>
                    </ul>
                    @include('adoptions.partials.card', ['adoption' => $adoption])
                </div>
            @empty
                <h2>This list is empty</h2>
            @endforelse
        </div>
    </div>
@endsection
