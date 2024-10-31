<ul class="navbar-nav bg-gradient-success sidebar sidebar-light accordion" id="accordionSidebar">
    <!-- 主頁顏色 -->

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($active == 'home'){{ 'active' }}@endif">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>首頁</span></a>
    </li>

    <li class="nav-item @if($active == 'event_manager'){{ 'active' }}@endif">
        <a class="nav-link " href="{{ route('event.manage') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>事件管理</span></a>
    </li>

    <li class="nav-item @if($active == 'tag_manager'){{ 'active' }}@endif">
        <a class="nav-link " href="{{ route('tag') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>標籤管理</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->

    @php($arr = in_array($active, ['password_reset']))
    <li class="nav-item @if($arr){{ ' active' }}@endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>設定</span></a>

        <div id="collapseUtilities" class="collapse @if($arr){{ ' show' }}@endif" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-border.html">個人設定</a>
                <a class="collapse-item" href="utilities-animation.html">發送設定</a>
                <a class="collapse-item @if($active == 'password_reset'){{ 'active' }}@endif" href="{{ route('password.reset') }}">修改密碼</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        介面
    </div>

    <li class="nav-item">
        <a class="nav-link " href="?main=event_manage">
            <i class="fas fa-fw fa-wrench"></i>
            <span>其他待開發功能</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
