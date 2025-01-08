<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard') }}" wire:navigate>
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Page</li>
        <li class="nav-item">
            <a class="nav-link
            {{ Route::currentRouteName() === 'categories.index' ||Route::currentRouteName() === 'categories.create' || Route::currentRouteName() === 'categories.edit' ? '' : 'collapsed' }}
            " href="{{ route('categories.index') }}" wire:navigate>
                <i class="bi bi-clipboard-check"></i>
                <span>Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'products.index' || Route::currentRouteName() === 'products.create' || Route::currentRouteName() === 'products.edit' ? '' : 'collapsed' }}" href="{{ route('products.index') }}" wire:navigate>
                <i class="bi bi-bag-check"></i>
                <span>Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'orders.index' || Route::currentRouteName() === 'orders.create' ? '' : 'collapsed' }}" href="{{ route('orders.index') }}" wire:navigate>
                <i class="bi bi-cart"></i>
                <span>Orders</span>
            </a>
        </li>
        <li class="nav-item collapsed">
            <a class="nav-link {{ Route::currentRouteName() === 'laporan.index' ? '' : 'collapsed' }}" href="{{ route('laporan.index') }}" wire:navigate>
                <i class="bi bi-printer"></i>
                <span>Laporan</span>
            </a>
        </li>
        <!-- End Icons Nav -->
        <li class="nav-heading">Role&nbsp;Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#role-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="role-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="icons-bootstrap.html">
                        <i class="bi bi-circle"></i><span>User Settings</span>
                    </a>
                </li>
                <li>
                    <a href="icons-remix.html">
                        <i class="bi bi-circle"></i><span>Role Settings</span>
                    </a>
                </li>
                <li>
                    <a href="icons-boxicons.html">
                        <i class="bi bi-circle"></i><span>Permission Settings</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->