<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LPM ITENAS</div>
            </a>

            <!-- Divider -->
            @guest
                <li class="nav-item active">
                        <a href="{{ route('login') }}" class="nav-link "><i class="fa fa-login" aria-hidden="true"></i><span>Login</span></a>
                </li>
            @else
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-fw fa-user"></i>
                            <span>{{Auth::user()->name}}</span>
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </li>

            @endguest
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
            @guest
            
            @else
            <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-file"></i>
                        <span>PKM</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/pkm">PKM</a>
                            <a class="collapse-item" href="/target">Target PKM</a>
                            <a class="collapse-item" href="/standar">Standar</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="/fasilitas">
                        <i class="fas fa-fw fa-building"></i>
                        <span>Fasilitas</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kelembagaan">
                        <i class="fas fa-fw fa-sitemap"></i>
                        <span>Kelembagaan Pengabdian</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="/manajemen">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manajemen Pengabdian</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="/unit_bisnis">
                        <i class="fas fa-fw fa-briefcase"></i>
                        <span>Revenue Generating</span></a>
                </li>
                <!-- Nav Item - Tables -->
                @if(Auth::user()->role == 'super admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/sumb">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Sumber Iptek</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dosen">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Staff Dosen</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prodi">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Prodi</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/fakultas">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Fakultas</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <i class="fas fa-fw fa-users"></i>
                            <span>User</span></a>
                    </li>
                    
                @endif
                <hr class="sidebar-divider d-none d-md-block">
            @endguest

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
        </ul>

        