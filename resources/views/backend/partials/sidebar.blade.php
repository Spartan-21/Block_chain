<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Laravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @permission('view.farms')
                <li class="nav-item">
                    <a href="{{ route('farms') }}" class="nav-link {{ (request()->routeIs('farms') || request()->is('auth/farms/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tractor"></i>
                        <p>Farms</p>
                    </a>
                </li>
                @endpermission

                @permission('view.processing')
                <li class="nav-item">
                    <a href="{{ route('processings.index') }}" class="nav-link {{ (request()->routeIs('processing.index') || request()->is('auth/processing/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>Processing</p>
                    </a>
                </li>
                @endpermission

                @permission('view.distribution')
                <li class="nav-item">
                    <a href="{{ route('distributions') }}" class="nav-link {{ (request()->routeIs('distributions') || request()->is('auth/distributions/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>Distribution</p>
                    </a>
                </li>
                @endpermission

                @permission('view.quality.control')
                <li class="nav-item">
                    <a href="{{ route('quality') }}" class="nav-link {{ (request()->routeIs('quality') || request()->is('auth/quality/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>Quality Testing</p>
                    </a>
                </li>
                @endpermission

                @permission('view.distribution')
                <li class="nav-item">
                    <a href="{{ route('distributions') }}" class="nav-link {{ (request()->routeIs('distributions') || request()->is('auth/distributions/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>End User</p>
                    </a>
                </li>
                @endpermission

                @permission('view.roles|view.permissions|view.users')
                <li class="nav-header">ACCESS CONTROL</li>
                
                @permission('view.roles')
                <li class="nav-item">
                    <a href="{{ route('roles') }}" class="nav-link {{ (request()->is('auth/roles') || request()->is('auth/roles/*')) ? 'active' : '' }}">
                        <i class="fas fa-user-shield nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endpermission

                @permission('view.permissions')
                <li class="nav-item">
                    <a href="{{ route('permissions') }}" class="nav-link {{ (request()->is('auth/permissions') || request()->is('auth/permissions/*')) ? 'active' : '' }}">
                        <i class="fas fa-user-shield nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                @endpermission

                @permission('view.users')
                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link {{ (request()->is('auth/users') || request()->is('auth/users/*')) ? 'active' : '' }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>User Accounts</p>
                    </a>
                </li>
                @endpermission

                @endpermission
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
