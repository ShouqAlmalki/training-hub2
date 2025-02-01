<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
    <div class="sidenav-header text-center">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="#">
            <img src="{{ asset('assets/images/TrainingHub-logo.png') }}" class="navbar-brand-img" alt="main_logo">
        </a>
    </div>
    
    <hr class="horizontal dark mt-0 mb-2">
    
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.dashboard') || Route::is('supervisor.dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                   href="{{ $user->role == 'student' ? route('student.dashboard') : route('supervisor.dashboard') }}">
                    <i class="material-symbols-rounded opacity-5 me-2">dashboard</i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>

            <!-- Experience -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('experiance') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                   href="{{ route('experiance') }}">
                    <i class="material-symbols-rounded opacity-5 me-2">star</i>
                    <span class="nav-link-text">Experience</span>
                </a>
            </li>

            <!-- Messages -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.chat') || Route::is('supervisor.chat') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                   href="{{ $user->role == 'student' ? route('student.chat') : route('supervisor.chat') }}">
                    <i class="material-symbols-rounded opacity-5 me-2">message</i>
                    <span class="nav-link-text">Messages</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout -->
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn bg-gradient-danger w-100" 
                        onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="material-symbols-rounded opacity-5 me-2">logout</i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
