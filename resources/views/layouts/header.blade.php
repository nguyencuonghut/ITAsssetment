<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        @auth('admin')
          <a href="{{ route('admin.logout') }}" class="nav-link">
            Đăng xuất
          </a>
        @else
          <a href="{{route('admin.login')}}" class="nav-link">Đăng nhập</a>
        @endauth
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
