<nav class="navbar navbar-main navbar-expand-lg shadow-none mx-3 mt-3 border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container bg-white py-1 px-3 border-radius-xl shadow" style="height: 70px; padding: 20px;">
        <nav aria-label="breadcrumb" style="display: flex;">
            <ol class="breadcrumb mb-0 bg-gradient-warning text-white" style="margin-right: 10px;">
                <li class="breadcrumb-item text-sm">Welocme: {{ $user->name }}</li>
            </ol>
            @if ($user->role == 'student')
            <ol class="breadcrumb mb-0 bg-gradient-success text-white" style="margin-right: 10px;">
              <li class="breadcrumb-item text-sm">Your Supervisor is: {{ $user->supervisor->name }}</li>
            </ol>
            @endif
            <ol class="breadcrumb mb-0 bg-gradient-info text-white">
                <li class="breadcrumb-item text-sm">Your Section Number is: {{ $user->section_number }}</li>
            </ol>
          </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
        <ul class="navbar-nav d-flex align-items-center  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown pe-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="material-symbols-rounded">notifications</i> 
            </a>
            @if ($user->role == 'student')
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                @if ($notifications)
                @foreach ($notifications as $notification)
                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="avatar avatar-sm bg-gradient-info  me-3  my-auto">
                          <i class="fa fa-bell text-white"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Notification from your supervisor
                          </h6>
                            <small class="text-xs text-secondary mb-2">
                                {{ $notification->data['message'] }}
                            </small>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            Sent {{ $notification->created_at->diffForHumans() }}
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
                @else
                <li>
                  <small>No notification</small>
                </li>
                @endif
              </ul>
            @elseif ($user->role == 'supervisor')
            <div class="notification-form dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4">
              <div class="container">
                <form action="{{ route('supervisor.send.notification') }}" class="form-group" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <label for="notfication_message">Message</label>
                      <textarea name="message" id="notfication_message" class="form-control no-resize" placeholder="Enter your message here"></textarea>
                      <button class="btn btn-info mt-3" type="submit">Send Notification</button><br>
                      <small>
                        The students who will receive the message are:
                      </small>
                      <ul>
                        @foreach ($user->students as $student)
                          <li>{{ $student->name }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>