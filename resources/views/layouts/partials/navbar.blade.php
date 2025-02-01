<nav class="navbar navbar-main navbar-expand-lg shadow-none mx-3 mt-3 border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container bg-white py-2 px-4 border-radius-xl shadow" style="height: 70px;">
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <ol class="breadcrumb mb-0 bg-gradient-warning text-white px-3 py-2 rounded me-2">
                <li class="breadcrumb-item text-sm">Welcome: {{ $user->name }}</li>
            </ol>
            @if ($user->role == 'student')
                <ol class="breadcrumb mb-0 bg-gradient-success text-white px-3 py-2 rounded me-2">
                    <li class="breadcrumb-item text-sm">Your Supervisor: {{ $user->supervisor->name }}</li>
                </ol>
            @endif
            <ol class="breadcrumb mb-0 bg-gradient-info text-white px-3 py-2 rounded">
                <li class="breadcrumb-item text-sm">Section Number: {{ $user->section_number }}</li>
            </ol>
        </nav>

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbar">
            <ul class="navbar-nav d-flex align-items-center">
                <!-- Sidebar Toggle Button -->
                <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

                <!-- Notifications -->
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded">notifications</i> 
                    </a>

                    @if ($user->role == 'student')
                        <ul class="dropdown-menu dropdown-menu-end px-3 py-3" aria-labelledby="dropdownMenuButton">
                            @if ($notifications && count($notifications) > 0)
                                @foreach ($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-2">
                                                <div class="avatar avatar-sm bg-gradient-info me-3 d-flex align-items-center justify-content-center rounded-circle">
                                                    <i class="fa fa-bell text-white"></i>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="text-sm font-weight-normal mb-1">Supervisor Notification</h6>
                                                    <small class="text-xs text-secondary">{{ $notification->data['message'] }}</small>
                                                    <p class="text-xs text-secondary mb-0 mt-1">
                                                        <i class="fa fa-clock me-1"></i> Sent {{ $notification->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="text-center py-2"><small>No notifications</small></li>
                            @endif
                        </ul>
                    @elseif ($user->role == 'supervisor')
                        <div class="notification-form dropdown-menu dropdown-menu-end px-3 py-3">
                            <div class="container">
                                <form action="{{ route('supervisor.send.notification') }}" class="form-group" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="notification_message" class="form-label">Message</label>
                                        <textarea name="message" id="notification_message" class="form-control no-resize" placeholder="Enter your message here"></textarea>
                                    </div>
                                    <button class="btn btn-info w-100" type="submit">Send Notification</button>
                                    <small class="text-muted d-block mt-2">The students who will receive this message:</small>
                                    <ul class="list-unstyled mt-1">
                                        @foreach ($user->students as $student)
                                            <li class="text-sm text-secondary">• {{ $student->name }}</li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
