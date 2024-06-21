<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="./img/pm_favico.png" width="27px"></img>
        </div>
        <div class="sidebar-brand-text mx-3"><img src="./img/logoPM.png"></img></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Monitoring Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMonitoring"
            aria-expanded="true" aria-controls="collapseMonitoring">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Monitoring</span>
        </a>
        <div id="collapseMonitoring" class="collapse" aria-labelledby="headingMonitoring"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/tables-monitoring">Tables</a>
                <h6 class="collapse-header">Fungsi:</h6>
                <a class="collapse-item" href="/import-project">Import Project</a>
                <a class="collapse-item" href="/form-project">Input Project</a>
                <hr>
                <a class="collapse-item" href="/form-design">Input Design</a>
                <a class="collapse-item" href="/form-nesting">Input Nesting</a>
                <a class="collapse-item" href="/form-program">Input Program</a>
                <a class="collapse-item" href="/form-checker">Input Checker</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Konsesi Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKonsesi"
            aria-expanded="true" aria-controls="collapseKonsesi">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Konsesi</span>
        </a>
        <div id="collapseKonsesi" class="collapse" aria-labelledby="headingKonsesi" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/tables-konsesi">Tables</a>

                <h6 class="collapse-header">Fungsi:</h6>
                <a class="collapse-item" href="/form-konsesi">Input Data</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - User Management Collapse Menu -->

    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement"
            aria-expanded="true" aria-controls="collapseUserManagement">
            <i class="fas fa-fw fa-user"></i>
            <span>Manajemen Pengguna</span>
        </a>
        <div id="collapseUserManagement" class="collapse" aria-labelledby="headingUserManagement"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/tables-pengguna">Daftar Pengguna</a>
                <h6 class="collapse-header">Fungsi:</h6>
                <a class="collapse-item" href="/register">Tambah Pengguna</a>
            </div>
        </div>

    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>