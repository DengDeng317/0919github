<ul class="navbar-nav bg-gradient-success sidebar sidebar-light accordion" id="accordionSidebar">
    <!-- 主頁顏色 為什麼我改這邊的success會大跑色?-->

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/LOGO.png') }}" alt="" height="70px">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($active == 'home'){{ 'active' }}@endif">
        <a class="nav-link" href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
            </svg>
            <span>首頁</span></a>
    </li>

    <li class="nav-item @if($active == 'event_manager'){{ 'active' }}@endif">
        <a class="nav-link " href="{{ route('event.manage') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
            </svg>
            <span>事件管理</span></a>
    </li>

    <li class="nav-item @if($active == 'tag_manager'){{ 'active' }}@endif">
        <a class="nav-link " href="{{ route('tag') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-substack" viewBox="0 0 16 16">
                <path d="M15 3.604H1v1.891h14v-1.89ZM1 7.208V16l7-3.926L15 16V7.208zM15 0H1v1.89h14z"/>
            </svg>
            <span>標籤管理</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->

    @php($arr = in_array($active, ['password_reset','personal','notification']))
    <li class="nav-item @if($arr){{ ' active' }}@endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>設定</span></a>

        <div id="collapseUtilities" class="collapse @if($arr){{ ' show' }}@endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($active == 'personal'){{ 'active' }}@endif" href="{{ route('personal') }}">個人設定</a>
                <a class="collapse-item @if($active == 'notification'){{ 'active' }}@endif" href="{{ route('notification') }}">通知設定</a>
                <a class="collapse-item @if($active == 'password_reset'){{ 'active' }}@endif" href="{{ route('password.reset') }}">修改密碼</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!--  <div class="sidebar-heading">
        介面
    </div>-->

    <li class="nav-item">
        <a class="nav-link " href="?main=event_manage">
            <i class="fas fa-fw fa-wrench"></i>
            <span>待開發</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
