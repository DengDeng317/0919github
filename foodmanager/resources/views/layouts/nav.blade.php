<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-success">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Illuminate\Support\Facades\Auth::user()->username }}</span>
                <img class="img-profile rounded-circle" src="@if(\Illuminate\Support\Facades\Auth::user()->img_url){{ asset(\Illuminate\Support\Facades\Auth::user()->img_url) }}@else{{ asset('img/undraw_profile.svg') }}@endif">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('personal') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    個人設定
                </a>
                <a class="dropdown-item" href="{{ route('notification') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    發送設定
                </a>
                <a class="dropdown-item" href="{{ route('password.reset') }}">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    修改密碼
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    登出
                </a>
            </div>
        </li>

    </ul>

</nav>
