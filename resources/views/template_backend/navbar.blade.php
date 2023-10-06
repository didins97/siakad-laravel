<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0f4c81;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #fff;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown show mr-2">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                <i class="nav-icon fas fa-bell" style="color: #ffffff;"></i>
                <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right show" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">{{ auth()->user()->unreadNotifications->count() }}
                    Notifications</span>
                <div class="dropdown-divider"></div>
                @foreach (auth()->user()->unreadNotifications as $notification)
                    @if ($notification->type === 'App\Notifications\JamMasukNotification')
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-clock mr-2"></i> {{ $notification->created_at->diffForHumans() }}
                            <div class="dropdown-message">{{ $notification->data['message'] }}</div>
                            <div class="dropdown-details">
                                <div>Mapel: {{ $notification->data['data']['mapel'] }}</div>
                                <div>Jam Mulai: {{ $notification->data['data']['jam_mulai'] }}</div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST"
                            action="{{ route('notifications.markAsRead', ['notification' => $notification->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light">Tandai Dibaca</button>
                        </form>
                    @elseif ($notification->type === 'App\Notifications\JamMengajarNotification')
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-clock mr-2"></i> {{ $notification->created_at->diffForHumans() }}
                            <div class="dropdown-message">{{ $notification->data['message'] }}</div>
                            <div class="dropdown-details">
                                <div>Kelas: {{ $notification->data['data']['kelas'] }}</div>
                                <div>Mapel: {{ $notification->data['data']['mapel'] }}</div>
                                <div>Jam Mulai: {{ $notification->data['data']['jam_mulai'] }}</div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST"
                            action="{{ route('notifications.markAsRead', ['notification' => $notification->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light">Tandai Dibaca</button>
                        </form>
                    @endif
                @endforeach

                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <div class="btn-group" role="group">
                <a id="btnGroupDrop1" style="color: #fff; margin-right: 40px;" type="button"
                    class="dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="nav-icon fas fa-user-circle"></i> &nbsp; {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="nav-icon fas fa-user"></i> &nbsp;
                        My Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
