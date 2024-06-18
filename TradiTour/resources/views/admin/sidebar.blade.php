<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('image/TRADITOUR.png') }}" alt="Logo" style="width: 40px; height: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">TRADITOUR <sup></sup></div>
    </a>



    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.landingpage') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tabel Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Menu Wisata</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ragam Budaya</h6>
                <a class="collapse-item" href="{{ route('admin.bahari.index') }}">Bahari</a>
                <a class="collapse-item" href="{{ route('admin.nonbahari.index') }}">Non Bahari</a>
                <a class="collapse-item" href="{{ route('admin.senibudaya.index') }}">Seni Budaya</a>
                <a class="collapse-item" href="{{ route('admin.kuliner.index') }}">Kuliner</a>
                <a class="collapse-item" href="{{ route('admin.kerajinankreatif.index') }}">Kerajinan Kreatif</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Lainnya</h6>
                <a class="collapse-item" href="{{ route('admin.penginapan.index') }}">Penginapan</a>
                <a class="collapse-item" href="{{ route('admin.gallery.index') }}">Galeri</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span> Menu Forum</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Forums</h6>
                <a class="collapse-item" href="{{ route('admin.forum.index') }}">Forum</a>
                <a class="collapse-item" href="{{ route('admin.comment.index') }}">Comment</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>