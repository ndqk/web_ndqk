<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('profile.index')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{request()->routeIs('admin.home') ? 'menu-open' : ''}} ">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('admin.home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link {{request()->routeIs('admin.home') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">QUẢN LÝ SẢN PHẨM</li>

          <li class="nav-item has-treeview {{request()->routeIs('category*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('category*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Quản lý Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{request()->routeIs('category.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->routeIs('post*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('post*') ? 'active' : ''}}">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Quản lý bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link {{request()->routeIs('post.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.create')}}" class="nav-link {{request()->routeIs('post.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới bài viết</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">QUẢN LÝ TÀI KHOẢN</li>

          <li class="nav-item has-treeview {{request()->routeIs('role*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('role*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-bezier-curve"></i>
              <p>
                Quản lý Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link {{request()->routeIs('role.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('role.create')}}" class="nav-link {{request()->routeIs('role.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới Role</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->routeIs('user*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('user*') ? 'active' : ''}}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Quản lý User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.list')}}" class="nav-link {{request()->routeIs('user.list') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link {{request()->routeIs('user.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">QUẢN LÝ KHÁCH HÀNG</li>

          <li class="nav-item has-treeview {{request()->routeIs('customer*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('customer*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.list')}}" class="nav-link {{request()->routeIs('customer.list') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customer.create')}}" class="nav-link {{request()->routeIs('customer.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới Customer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">QUẢN LÝ GIAO DIỆN</li>

          <li class="nav-item has-treeview {{request()->routeIs('banner*') ? 'menu-open' : ''}}">
            <a href="{{asset('#')}}" class="nav-link {{request()->routeIs('banner*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Quản lý Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link {{request()->routeIs('banner.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('banner.create')}}" class="nav-link {{request()->routeIs('banner.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới banner</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">QUẢN LÝ QUẢNG CÁO</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>