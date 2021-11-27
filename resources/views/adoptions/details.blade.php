@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Adopt me
                    </div>
                    <div class="card-body">
                        <h5 class="pet-name">{{ $adoption->name }}</h5>
                        <p class="pet-description">{{ $adoption->description }}</p>
                        <p>Listed by: <b>{{ $adoption->listedBy->name }}</b></p>
                        @if(auth()->check())
                        @if($adoption->listed_by !== auth()->id())
                        <form method="post" action="{{ route('adoptions.adopt', [$adoption->id]) }}">
                            @csrf
                            <button type="submit" class="pet-adopt">Adopt Now
                            </button>
                        </form>
                        @endif
                        @endif
                        @if($adoption->adoptedBy != null)
                            @if($adoption->adoptedBy == auth()->id())
                                <p class="text-success">This pet has been adopted by you :)</p>
                            @else
                                <p class="text-danger">This pet has already been adopted.</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="ratio ratio-1x1 ">
                    <img src="{{ asset($adoption->image_path) }}"
                         class="card-img-top border border-2 border-dark rounded-3"
                         style="object-fit: cover" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
