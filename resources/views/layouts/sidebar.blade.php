
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        @auth('admin')
        {{Auth::user()->name}}
        @else
        Quản lý thiết bị CNTT
        @endauth
    </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @auth('admin')
          <li class="nav-item">
            <a href="{{ route('admin.home') }}"  class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="/"  class="nav-link {{ Request::is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('assets.index') }}" class="nav-link {{ Request::is('assets*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-barcode"></i>
              <p>Tài sản</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('audits.index') }}" class="nav-link {{ Request::is('audits*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>Kiểm kê</p>
            </a>
          </li>
          @endauth

          @auth('admin')
          <li class="nav-header">QUẢN TRỊ</li>
          <li class="nav-item">
            <a href="{{ route('admin.assets.index') }}" class="nav-link {{ Request::is('admin/assets*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-barcode"></i>
              <p>Tài sản</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.audits.audit') }}" class="nav-link {{ Request::is('admin/audits*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>Kiểm kê</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.admins.index') }}" class="nav-link {{ Request::is('admin/admins*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>Admin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.employees.index') }}" class="nav-link {{ Request::is('admin/employees*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Người dùng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.departments.index') }}" class="nav-link {{ Request::is('admin/departments*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>Phòng ban</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.areas.index') }}" class="nav-link {{ Request::is('admin/areas*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>Vị trí</p>
            </a>
          </li>

          <li class="nav-header">CẤU HÌNH</li>
          <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.manufacturers.index') }}" class="nav-link {{ Request::is('admin/manufacturers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tag"></i>
              <p>Hãng sản xuất</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.suppliers.index') }}" class="nav-link {{ Request::is('admin/suppliers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-truck"></i>
              <p>Nhà cung cấp</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.models.index') }}" class="nav-link {{ Request::is('admin/models*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clone"></i>
              <p>Model thiết bị</p>
            </a>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
