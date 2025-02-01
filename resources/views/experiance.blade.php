@extends('layouts.custom.app')
@section('title', 'Experiences')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-light">
                    <h4 class="mb-0 text-primary fw-bold">💼 Organizations' Experiences</h4>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                        @foreach ($organizations as $org)
                            <div class="card border-0 shadow-sm {{ $org->ratings->count() > 0 ? 'hover-effect' : '' }}">
                                @if ($org->ratings->count() > 0)
                                    <a href="{{ route('fillter.orgnization', $org->name) }}" class="text-decoration-none text-dark">
                                        <div class="card-body text-center">
                                @else
                                        <div class="card-body text-center text-muted">
                                @endif
                                            <h5 class="fw-bold">{{ $org->name }}</h5>
                                            <p class="text-muted">Total Ratings: {{ $org->ratings->count() }}</p>
                                            <div class="d-flex justify-content-center">
                                                @php
                                                    $averageRating = round($org->ratings->avg('rating') ?? 0);
                                                @endphp
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $averageRating)
                                                        <span class="text-warning fs-4">★</span>
                                                    @else
                                                        <span class="text-secondary fs-4">☆</span>
                                                    @endif
                                                @endfor
                                            </div>
                                @if ($org->ratings->count() > 0)
                                        </div>
                                    </a>
                                @else
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
    }
</style>

@endsection
