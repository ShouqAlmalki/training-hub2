<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>Training Hub</title>
    <style>
        .orgcard {
            text-decoration: none;
            color: inherit;
        }
        
        .card {
            border-radius: 10px;
            transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .filled-star {
            font-size: 18px;
            color: gold;
        }

        .empty-star {
            font-size: 18px;
            color: lightgray;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-3">
            <div class="col-md-3">
                <a href="/" class="d-inline-flex text-decoration-none">
                    <img src="{{ asset('assets/images/TrainingHub-logo.png') }}" alt="logo" width="200">
                </a>
            </div>

            @auth
                <div class="col-md-3 text-end">
                    <a href="{{ auth()->user()->role == 'student' ? route('student.dashboard') : route('supervisor.dashboard') }}" 
                       class="btn btn-outline-primary">
                       Dashboard
                    </a>
                </div>
            @endauth

            @guest
                <div class="col-md-3 text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                </div>
            @endguest
        </header>
    </div>

    <div class="bg-dark text-light text-center py-5">
        <h1 class="display-5 fw-bold">Training Hub</h1>
        <p class="fs-5 mt-3">
            A platform that connects students with their supervisors during training.<br>
            It facilitates communication, report submissions, and experience sharing.
        </p>
    </div>

    <div class="container">
        <h4 class="mb-3 mt-4 header-title">Recent Experiences</h4>
        <div class="row">
            @foreach ($organizations as $organization)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('fillter.orgnization', $organization->name) }}" class="orgcard">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $organization->name }}</h5>
                                <p class="mb-1"><small>Total Ratings: {{ $organization->ratings->count() }}</small></p>
                                
                                @php
                                    $averageRating = round($organization->ratings->avg('rating') ?? 0);
                                @endphp
                                <div>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $averageRating ? 'filled-star' : 'empty-star' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
