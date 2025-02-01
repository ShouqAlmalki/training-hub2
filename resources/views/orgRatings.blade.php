<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>Training Hub | {{ $organization->name }} </title>
    <style>
        /* تحسين تصميم البطاقات */
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

        /* تصميم النجوم */
        .filled-star {
            font-size: 20px;
            color: gold;
        }

        .empty-star {
            font-size: 20px;
            color: lightgray;
        }

        /* تحسين تصميم الهيدر */
        .custom-header {
            background-color: #1c1c1c; /* لون داكن للهيدر */
            color: white;
            padding: 20px;
            text-align: center;
            
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
        }

        .btn-back {
            margin-top: 10px;
            padding: 8px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <!-- 🔹 الهيدر بتصميم غامق مميز -->
    <div class="custom-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="d-inline-flex text-decoration-none">
                <img src="{{ asset('assets/images/TrainingHub-logo.png') }}" alt="logo" width="180">
            </a>

            <a href="{{ url()->previous() }}" class="btn btn-outline-light">Back</a>
        </div>
    </div>

    <!-- 🔹 محتوى الصفحة -->
    <div class="container">
        <h4 class="mb-3 mt-4 header-title text-center">Recent Experiences for {{ $organization->name }}</h4>
        <div class="row">
            @if ($ratings->count() > 0)
                @foreach ($ratings as $rate)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="text-muted">{{ $rate->overview }}</p>
                            </div>
                            <div class="card-footer text-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $rate->rating ? 'filled-star' : 'empty-star' }}">★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning mt-3 text-center" role="alert">
                    There are no overviews to display.
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
