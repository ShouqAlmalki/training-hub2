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
              .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <img src="{{ asset('assets/images/TrainingHub-logo.png') }}" alt="logo" width="200">
            </a>
          </div>    
          @auth
              @if (auth()->user()->role == 'student')
                  <div class="col-md-3 text-end">
                      <a href="{{ route('student.dashboard') }}" type="button" class="btn btn-outline-primary me-2">Dashboard</a>
                  </div>
              @elseif (auth()->user()->role == 'supervisor')
                  <div class="col-md-3 text-end">
                      <a href="{{ route('supervisor.dashboard') }}" type="button" class="btn btn-outline-primary me-2">Dashboard</a>
                  </div>
              @endif
            
          @endauth
          @guest
              <div class="col-md-3 text-end">
                  <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary me-2">Login</a>
              </div>
          @endguest
        </header>
      </div>

      <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
          <h1 class="display-5 fw-bold text-white">Training Hub</h1>
          <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">A platform that brings together the student and his supervisor during <br> training. It helps them communicate, attach reports, and share the <br> student's experience in the institution in which he trained</p>
          </div>
          <a href="{{ url()->previous() }}" class="btn btn-primary">Back to home</a>
        </div>
      </div>

      <div class="container">
        <h4 class="mb-2 mt-3">Recent Experience for {{ $organization->name }}</h4>
        <div class="row">
          @if ($ratings->count() > 0)
            @foreach ($ratings as $rate)
              <div class="col-md-4 mt-2 mb-4">
                <div class="card">
                  <div class="card-body">
                    <p>
                      {{ $rate->overview }}
                    </p>
                  </div>
                  <div class="card-footer">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $rate->rating)
                          <span class="filled-star">★</span> <!-- Filled Star -->
                      @else
                          <span class="filled-star">☆</span> <!-- Empty Star -->
                      @endif
                    @endfor
                  </div>
                </div>
              </div>
            @endforeach
          @else
          <div class="alert alert-success mt-2 mb-2" role="alert">
            There are no overviews to display
          </div>
          @endif
        </div>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>