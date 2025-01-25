@extends('layouts.custom.app')
@section('title', 'Experiences')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h4>Experiences</h4>
                <hr>
                <div class="col-md-12">
                    <label for="orgnization">Filter by Organization</label>
                    <select name="orgnization" id="orgnization" class="form-control">
                        <option value="">Select Orgnization</option>
                        @foreach ($organizations as $org)
                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                @foreach ($organizations as $org)
                    <div class="col-md-4 mt-2 mb-2">
                        <div class="card mt-1 mb-1">
                            <div class="card-body">
                                <h6>{{ $org->name }}</h6>
                                <small>Total Rating: {{ $org->ratings->count() }}</small>
                                <br>
                                @php
                                $averageRating = round($org->ratings->avg('rating') ?? 0); // Round to nearest whole number
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                    <span class="filled-star">★</span> <!-- Filled Star -->
                                @else
                                    <span class="filled-star">☆</span> <!-- Empty Star -->
                                @endif
                            @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection