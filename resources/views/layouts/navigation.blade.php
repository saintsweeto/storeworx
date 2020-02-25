<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar-collapse" aria-controls="sidebar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/home">
            <img src="/img/storeworx-logo.png" class="navbar-brand-img mx-auto">
        </a>
        <div class="collapse navbar-collapse" id="sidebar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->getPathInfo() == '/home' ? 'active': '' }}">
                    <a class="nav-link" href="/home">
                        <span class="fe fe-home"></span> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebar-assets" data-toggle="collapse" role="button">
                        <i class="fe fe-archive"></i> Assets
                    </a>
                    <div class="collapse {{ in_array(request()->getPathInfo(), ['/assets/create', '/assets']) ? 'show': '' }}" id="sidebar-assets">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ request()->getPathInfo() == '/assets/create' ? 'active': '' }}">
                                <a href="/assets/create" class="nav-link">
                                    New
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/assets" class="nav-link {{ request()->getPathInfo() == '/assets' ? 'active': '' }}">
                                    View All
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->getPathInfo() == '/jobs' ? 'active': '' }}">
                    <a class="nav-link" href="/jobs">
                        <i class="fe fe-edit-3"></i> Jobs
                    </a>
                </li>
                <li class="nav-item {{ request()->getPathInfo() == '/movements' ? 'active': '' }}">
                    <a class="nav-link" href="/movements">
                        <i class="fe fe-book-open"></i> Movements
                    </a>
                </li>
                <li class="nav-item {{ request()->getPathInfo() == '/reports' ? 'active': '' }}">
                    <a class="nav-link" href="/reports/assets">
                        <span class="fe fe-file"></span> Reports
                    </a>
                </li>
            </ul>

            <div class="mt-auto"></div>

            <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                <a href="#sidebar-modal-activity" class="navbar-user-link" data-toggle="modal">
                    <span class="icon">
                        <i class="fe fe-bell"></i>
                    </span>
                </a>
                <div class="dropup">
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="/img/user.png" class="avatar-img rounded-circle" alt="avatar-img">
                        </div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="/profile" class="dropdown-item">Profile</a>
                        <a href="/settings" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <a href="#sidebar-modal-search" class="navbar-user-link" data-toggle="modal">
                    <span class="icon">
                        <i class="fe fe-search"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
