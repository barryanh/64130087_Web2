<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VemOni</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if (Request::segment(2) == '') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('topics.index') }}"
                        class="nav-link @if (Route::currentRouteName() == 'topics.index') active @endif">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Topic - List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('topics.create') }}"
                        class="nav-link @if (Route::currentRouteName() == 'topics.create') active @endif">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Topic - Addnew</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('students.index') }}"
                        class="nav-link @if (Route::currentRouteName() == 'students.index') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Student - List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('students.create') }}"
                        class="nav-link @if (Route::currentRouteName() == 'students.create') active @endif">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Student - Addnew</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
