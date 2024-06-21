@php
use Illuminate\Support\Facades\Auth;
@endphp

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link">
                <div id="datetime">
                    <span id="date"></span>
                    <span id="time"></span>
                </div>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()-> nama }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" alt="Profile Image">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="detail-user.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Detail
                </a>
                <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" id="logoutLink" method="POST">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                    @csrf
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- Page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="/js/logout.js"></script>
<script src="/js/date-time.js"></script>