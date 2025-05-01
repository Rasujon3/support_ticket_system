<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link">
        <span class="brand-text font-weight-light">Modular Project</span>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ request()->is('dashboard' , 'dashboard/*' , 'dashboard-*') ? 'menu-open' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('products', 'products/*') ? 'menu-open' : '' }}">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>

                {{-- Tickets--}}
                <li class="nav-item {{ request()->is('tickets', 'tickets/*') ? 'menu-open' : '' }}">
                    <a href="{{ route('tickets.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Tickets</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
