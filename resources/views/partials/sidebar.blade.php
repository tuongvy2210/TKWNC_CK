<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Lịch sử đặt phòng</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('rooms.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý phòng</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('types.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý loại phòng</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('services.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý dịch vụ</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý khách hàng</span></a>
    </li>

</ul>
<!-- End of Sidebar -->
