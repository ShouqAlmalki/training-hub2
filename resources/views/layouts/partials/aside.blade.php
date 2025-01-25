<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="#" target="_blank">
        <img src="{{ asset('assets/images/TrainingHub-logo.png') }}" class="navbar-brand-img" {{-- width="26" height="26" --}} alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ route::is('student.dashboard') || route::is('supervisor.dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
            href="
            @if ($user->role == 'student')
              {{ route('student.dashboard') }}
            @elseif ($user->role == 'supervisor')
              {{ route('supervisor.dashboard') }}
            @endif
            ">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route::is('experiance') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{route('experiance')}}">
            <i class="material-symbols-rounded opacity-5">Star</i>
            <span class="nav-link-text ms-1">Experience</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route::is('student.chat') || route::is('supervisor.chat') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
           href="
           @if ($user->role == 'student')
             {{ route('student.chat') }}
             @elseif ($user->role == 'supervisor')
             {{ route('supervisor.chat') }}
           @endif
           ">
            <i class="material-symbols-rounded opacity-5">Message</i>
            <span class="nav-link-text ms-1">Messages</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn bg-gradient-danger w-100" onclick="event.preventDefault();this.closest('form').submit();"><i class="material-symbols-rounded opacity-5">logout</i>Logout</button>
        </form>
      </div>
    </div>
</aside>